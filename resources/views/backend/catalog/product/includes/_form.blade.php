@if(isset($model))
    {!! Form::model($model, ['route' => ['admin.catalog.product.update', $model->id], 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'put', 'files' => true]) !!}
@else
    {{ Form::open(['route' => 'admin.catalog.product.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'files' => true]) }}
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.catalog.products.management') }}
                    <small class="text-muted">
                        @if(isset($model)) {{ __('labels.backend.catalog.products.edit') }}
                        @else {{ __('labels.backend.catalog.products.create') }}
                        @endif
                    </small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr/>

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.cover'))
                        ->class('col-md-2 form-control-label')
                        ->for('cover') }}

                    <div class="col-md-10">
                        {{ html()->file('cover')
                            ->class('form-control')
                            ->attribute('accept', 'image/*')
                            ->required() }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.name'))
                        ->class('col-md-2 form-control-label')
                        ->for('name') }}

                    <div class="col-md-10">
                        {{ Form::text('name', null, [
                            'class' => 'form-control',
                            'maxlength' => 191,
                            'placeholder' => __('validation.attributes.backend.catalog.products.name'),
                            'required']) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.category'))
                        ->class('col-md-2 form-control-label')
                        ->for('category_id') }}

                    <div class="col-md-10">
                        {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.description'))
                        ->class('col-md-2 form-control-label')
                        ->for('description') }}

                    <div class="col-md-10">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor', 'placeholder' => __('validation.attributes.backend.catalog.products.description'), 'required']) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.height'))
                        ->class('col-md-2 form-control-label')
                        ->for('height') }}

                    <div class="col-md-10">
                        {{ Form::text('height', null, [
                            'class' => 'form-control',
                            'maxlength' => 191,
                            'placeholder' => __('validation.attributes.backend.catalog.products.height'),
                            'required']) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.membership'))
                        ->class('col-md-2 form-control-label')
                        ->for('membership') }}

                    <div class="col-md-10">
                        {{ Form::text('membership', null, [
                            'class' => 'form-control',
                            'maxlength' => 191,
                            'placeholder' => __('validation.attributes.backend.catalog.products.membership')]) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.active'))
                        ->class('col-md-2 form-control-label')
                        ->for('status') }}

                    <div class="col-md-10">
                        {{ Form::checkbox('status', null, true) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.sold'))
                        ->class('col-md-2 form-control-label')
                        ->for('sold') }}

                    <div class="col-md-10">
                        {{ Form::checkbox('sold', null) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.featured'))
                        ->class('col-md-2 form-control-label')
                        ->for('featured') }}

                    <div class="col-md-10">
                        {{ Form::checkbox('featured', null) }}
                    </div><!--col-->
                </div><!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.catalog.products.made_history'))
                        ->class('col-md-2 form-control-label')
                        ->for('made_history') }}

                    <div class="col-md-10">
                        {{ Form::checkbox('made_history', null) }}
                    </div><!--col-->
                </div><!--form-group-->
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer clearfix">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.catalog.product.index'), __('buttons.general.cancel')) }}
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

@push('after-scripts')
    <script src="https://cdn.ckeditor.com/4.7.3/full-all/ckeditor.js"></script>
    <script>CKEDITOR.replace('editor', {
        toolbar: [
            { name: 'document', items: [ 'Print' ] },
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'align', items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
            { name: 'insert', items: [ 'Image', 'Table' ] },
            { name: 'tools', items: [ 'Maximize' ] },
            { name: 'editing', items: [ 'Scayt' ] }
        ],
    });</script>
@endpush