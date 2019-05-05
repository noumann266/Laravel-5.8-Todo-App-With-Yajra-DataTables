<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Todo;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class TodoController extends Controller
{
    public function index()
    {
        return $this->getRecords();
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data = array_except($data ,'_token');
        if($id =  Todo::create($data)){
            return redirect()->route('todo.index');
        }
    }
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->route('todo.index')
            ->with('flash_danger', trans('Todo #'.$todo->id.' is Deleted'));
    }
    public function edit(Todo $todo){
        return $todo;
    }
    public function update(Todo $todo , Request $request){
        $data = $request->all();
        $data = array_except($data ,'_token');
        if($todo->update($data)) {
            return redirect()->route('todo.index');
        }
    }
    private function getRecords(){
        return DataTables::of(Todo::query()->orderBy('id' , 'desc'))
            ->addColumn('action', function(Todo $todo) {
                return '<a href="#" data-toggle="modal" data-target="#editModal" onclick="edit('.$todo->id.')"  class="btn btn-primary">Edit</a> <a href="'.route("delete" , $todo->id).'" class="btn btn-danger">Move to Trash</a>';
            })
            ->rawColumns(['action'])
            ->setRowId(function (Todo $todo) {
                return $todo->id;
            })
            ->make(true);
    }
    public function getTrash()
    {
       return DataTables::of(Todo::query()->onlyTrashed()->orderBy('id' , 'desc'))
            ->addColumn('action', function(Todo $todo) {
                return '<a href="'.route("trash.restore" , $todo->id).'" class="btn btn-primary">Restore</a> <a href="'.route("trash.delete" , $todo->id).'" class="btn btn-danger">Permanently Delete</a>';
            })
            ->rawColumns(['action'])
            ->setRowId(function (Todo $todo) {
                return $todo->id;
            })
            ->make(true);
    }
    public function restoreTrash($todo)
    {
        Todo::onlyTrashed()->where('id' , (int)$todo)->restore();
        return view('todo.trash');
    }
    public function deleteTrash($todo)
    {
        Todo::onlyTrashed()->where('id' , (int)$todo)->forceDelete();
        return view('todo.trash');
    }
}
