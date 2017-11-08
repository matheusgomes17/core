@if(isset($model))
    {!! Form::model($model, ['route' => ['admin.system.gallery.image.update', $model->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT', 'files' => true]) !!}
@else
    {{ Form::open(['route' => 'admin.system.gallery.image.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true]) }}
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.system.galleries.management') }}
                    <small class="text-muted">
                        @if(isset($model)) {{ __('labels.backend.system.galleries.image.edit') }}
                        @else {{ __('labels.backend.system.galleries.image.create') }}
                        @endif
                    </small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr/>

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.system.galleries.image'))
                        ->class('col-md-2 form-control-label')
                        ->for('image') }}

                    <div class="col-md-10">
                        {{ html()->file('image')->class('form-control') }}
                    </div><!--col-->
                </div><!--form-group-->
            </div>
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer clearfix">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.system.gallery.index'), __('buttons.general.cancel')) }}
            </div><!--col-->

            <div class="col text-right">
                @if(isset($model)) {{ form_submit(__('buttons.general.crud.edit')) }}
                @else {{ form_submit(__('buttons.general.crud.create')) }}
                @endif
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
{{ Form::close() }}