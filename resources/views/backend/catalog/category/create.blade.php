@extends ('backend.layouts.app')

@section ('title', __('labels.backend.catalog.categories.management') . ' | ' . __('labels.backend.catalog.categories.create'))

@section('breadcrumb-links')
    @include('backend.catalog.category.includes.breadcrumb-links')
@endsection

@section('content')
    @include('backend.catalog.category.includes._form')
@endsection
