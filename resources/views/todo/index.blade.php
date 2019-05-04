@extends('layouts.app')
@section('content')
    @include('todo.includes.header-buttons' , [ 'link'=>'todo.view.trash' , 'class'=>'btn-danger' , 'name'=>'View Trash Records'])
    <h1>Records</h1>
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
        </thead>
    </table>
@stop
@push('scripts')
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('todo.list') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'description', name: 'description' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    </script>
    <script>
        function edit(id)
        {
            $.get("todo/edit/"+id, function(data, status){
                $('.edit_modal_content').html('' +
                    '<form action="todo/update/'+data.id+'" method="post">\n' +
                    '\n' + '{{ csrf_field() }}' +
                    '                    <h1>Edit Record</h1>\n' +
                    '\n' +
                    '                    <fieldset>\n' +
                    '                        <legend><span class="number">o</span> '+data.title+' </legend>\n' +
                    '                        <label for="title">Title:</label>\n' +
                    '                        <input required type="text" id="title" name="title" value="'+data.title+'">\n' +
                    '\n' +
                    '                        <label for="description">Description:</label>\n' +
                    '                        <input required type="text" id="description" value="'+data.description+'" name="description">\n' +
                    '                    </fieldset>\n' +
                    '\n' +
                    '                    <button type="submit">Update</button>\n' +
                    '                    <button id="cancel" class="btn-danger" data-dismiss="modal" type="submit">Cancel</button>\n' +
                    '\n' +
                    '                </form>');
            });

        }
    </script>
@endpush