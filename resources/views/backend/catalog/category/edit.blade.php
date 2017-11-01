@extends ('backend.layouts.app')

@section ('title', __('labels.backend.catalog.categories.management') . ' | ' . __('labels.backend.catalog.categories.edit'))

@section('breadcrumb-links')
    @include('backend.catalog.category.includes.breadcrumb-links')
@endsection

@section('content')
    @include('backend.catalog.category.includes._form', ['model' => $category])
@endsection
