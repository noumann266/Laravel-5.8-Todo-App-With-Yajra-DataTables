@extends ('.layouts.app')


@section('content')
    <form action="" method="post">

        <h1>Submit Record</h1>

        <fieldset>
            <legend><span class="number">o</span> Enter info</legend>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">

            <label for="description">Description:</label>
            <input type="email" id="description" name="description">
        </fieldset>

        <button type="submit">Submit</button>
        <button class="btn-danger" data-dismiss="modal" type="submit">Cancel</button>

    </form>
@endsection
