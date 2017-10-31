@extends ('backend.layouts.app')

@section ('title', __('labels.backend.catalog.products.management') . ' | ' . __('labels.backend.catalog.products.create'))

@section('breadcrumb-links')
    @include('backend.catalog.product.includes.breadcrumb-links')
@endsection

@section('content')
    @include('backend.catalog.product.includes._form')
@endsection
