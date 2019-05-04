@if(@$trash_button == 'cat-trash')
    <div class="card-footer">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.category.index'), __('buttons.general.cancel')) }}
            </div><!--col-->

            <div class="col text-right">

                <button class="btn btn-success btn-sm pull-right restore-cat-button" >Restore All</button>
                <button class="btn btn-danger btn-sm delete-cat-button">Delete All</button>

            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
@endif

@if(@$name)
    <div class="card-footer">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.category.index'), __('buttons.general.cancel')) }}
            </div><!--col-->

            <div class="col text-right">
                {{ form_submit(__($name)) }}
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
@endif