@if(isset($model))
    {!! Form::model($model, ['route' => ['admin.system.deposition.update', $model->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put', 'files' => true]) !!}
@else
    {{ Form::open(['route' => 'admin.system.deposition.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true]) }}
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.system.depositions.management') }}
                    <small class="text-muted">
                        @if(isset($model)) {{ __('labels.backend.system.depositions.edit') }}
                        @else {{ __('labels.backend.system.depositions.create') }}
                        @endif
                    </small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr/>

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.system.depositions.cover'))
                        ->class('col-md-2 form-control-label')
                        ->for('cover') }}

                    <div class="col-md-10">
                        {{ html()->file('cover')
                            ->class('form-control') }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.system.depositions.name'))
                        ->class('col-md-2 form-control-label')
                        ->for('name') }}

                    <div class="col-md-10">
                        {{ html()->text('name')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.system.depositions.name'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.system.depositions.link'))
                        ->class('col-md-2 form-control-label')
                        ->for('link') }}

                    <div class="col-md-10">
                        {{ html()->text('link')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.system.depositions.link'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.system.depositions.city'))
                        ->class('col-md-2 form-control-label')
                        ->for('city') }}

                    <div class="col-md-10">
                        {{ html()->text('city')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.system.depositions.city'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.system.depositions.state'))
                        ->class('col-md-2 form-control-label')
                        ->for('state') }}

                    <div class="col-md-10">
                        {{ html()->text('state')
                            ->class('form-control')
                            ->placeholder(__('validation.attributes.backend.system.depositions.state'))
                            ->attribute('maxlength', 191)
                            ->required() }}
                    </div><!--col-->
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer clearfix">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.system.deposition.index'), __('buttons.general.cancel')) }}
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