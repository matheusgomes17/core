@extends ('backend.layouts.app')

@section ('title', __('labels.backend.system.galleries.management') . ' | ' . __('labels.backend.system.galleries.create'))

@section('breadcrumb-links')
    @include('backend.system.gallery.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.system.galleries.management') }}
                    <small class="text-muted">{{ __('labels.backend.system.galleries.create') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <hr/>

        <div class="row mt-4 mb-4 text-center">
            <div class="col-sm-12">
                <div class="card-title mb-0">
                    <p style="font-size: 2em; font-weight: 600; color: #333;">Selecione abaixo um tipo de galeria para ser criada:</p>
                </div>
            </div><!--col-->
        </div>

        <div class="row mt-4 mb-4 text-center">
            <div class="col-sm-6">
                <div class="card-title mb-0">
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('admin.system.gallery.image.create') }}" title=""><i class="fa fa-camera"></i> {{ __('labels.backend.system.galleries.image.create') }}</a>
                </div>
            </div><!--col-->
            <div class="col-sm-6">
                <div class="card-title mb-0">
                    <a class="btn btn-success btn-lg btn-block" href="{{ route('admin.system.gallery.video.create') }}" title=""><i class="fa fa-video-camera"></i> {{ __('labels.backend.system.galleries.video.create') }}</a>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer clearfix">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.system.gallery.index'), __('buttons.general.cancel')) }}
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection
