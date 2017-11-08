@if(isset($model))
    {!! Form::model($model, ['route' => ['admin.system.gallery.video.update', $model->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'PUT']) !!}
@else
    {{ Form::open(['route' => 'admin.system.gallery.video.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST']) }}
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.system.galleries.management') }}
                    <small class="text-muted">
                        @if(isset($model)) {{ __('labels.backend.system.galleries.video.edit') }}
                        @else {{ __('labels.backend.system.galleries.video.create') }}
                        @endif
                    </small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr/>

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.system.galleries.video'))
                        ->class('col-md-1 form-control-label')
                        ->for('video') }}

                    <div class="col-md-6">
                        {{ Form::text('video', null, [
                            'class' => 'form-control',
                            'maxlength' => 191,
                            'placeholder' => __('validation.attributes.backend.system.galleries.video'),
                            'required']) }}
                    </div><!--col-->
                    <div class="col-md-5 form-control-label" for="video"><div style="color: #777">Ex: https://www.youtube.com/watch?v=<b style="color: #000; font-weight: 700;">xxxxxxx</b></div></div>
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