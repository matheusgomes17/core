@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

@section('breadcrumb-links')
    @include('backend.catalog.category.includes.breadcrumb-links')
@endsection

@section('content')
    @include('backend.catalog.category.includes._form')
@endsection
