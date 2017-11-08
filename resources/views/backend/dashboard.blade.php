@extends('backend.layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <strong>{{ __('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</strong>
                    <div class="float-right">{{ carbon() }}</div>
                </div><!--card-header-->
            </div><!--card-->
        </div><!--col-->

        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="icon-basket-loaded bg-primary p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-primary mb-0 mt-2">{{ $products }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">Animais</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a class="font-weight-bold font-xs btn-block text-muted" href="{{ route('admin.catalog.product.index') }}">Ver Mais <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="icon-layers bg-success p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-success mb-0 mt-2">{{ $categories }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">Categorias</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a class="font-weight-bold font-xs btn-block text-muted" href="{{ route('admin.catalog.category.index') }}">Ver Mais <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="icon-picture bg-danger p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-danger mb-0 mt-2">{{ $galleries }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">Galerias</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a class="font-weight-bold font-xs btn-block text-muted" href="{{ route('admin.system.gallery.index') }}">Ver Mais <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="icon-like bg-warning p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-warning mb-0 mt-2">{{ $depositions }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">Depoimentos</div>
                </div>
                <div class="card-footer px-3 py-2">
                    <a class="font-weight-bold font-xs btn-block text-muted" href="{{ route('admin.system.deposition.index') }}">Ver Mais <i class="fa fa-angle-right float-right font-lg"></i></a>
                </div>
            </div>
        </div>
    </div><!--row-->
@endsection