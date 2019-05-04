<div class="row mb-4">
    <div class="col text-center">
        <a href="#" id="add_new_record" class="btn btn-lg btn-success" data-toggle="modal" data-target="#basicModal">Add New Record</a>
        <a href="{{route($link)}}" class="btn btn-lg {{$class}}" >{{$name}}</a>
    </div>
</div>

<!-- basic modal -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                <form action="{{route('store')}}" method="post">
                    @csrf
                    <h1>Submit Record</h1>

                    <fieldset>
                        <legend><span class="number">o</span> Enter info</legend>
                        <label for="title">Title:</label>
                        <input required type="text" id="title" name="title">

                        <label for="description">Description:</label>
                        <input required type="text" id="description" name="description">
                    </fieldset>

                    <button type="submit">Submit</button>
                    <button id="cancel" class="btn-danger" data-dismiss="modal" type="submit">Cancel</button>

                </form>
        </div>

    </div>
</div>

<!-- basic modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content edit_modal_content">

        </div>

    </div>
</div>