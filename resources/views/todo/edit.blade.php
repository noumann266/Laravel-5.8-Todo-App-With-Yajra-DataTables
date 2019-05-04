@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('content')
{{ html()->modelForm($category, 'PATCH', route('admin.category.update', $category))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.roles.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.roles.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

            <div class="row mt-4">
                <div class="col">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.roles.name'))
                            ->class('col-md-2 form-control-label')
                            ->for('cat_name') }}

                        <div class="col-md-10">
                            {{ html()->text('cat_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.roles.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}

                        <div class="col-md-10 checkbox" >
                            {{ html()->label(
                            html()->checkbox('is_active')
                            ->class('switch-input')
                            . '<span class="switch-label"></span><span class="switch-handle"></span>')
                            ->class('switch switch-sm switch-3d switch-primary')
                            }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

       @include('backend.category.includes.footer_buttons' , [$name = "create"])
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection
