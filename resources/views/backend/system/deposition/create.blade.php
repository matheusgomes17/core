@extends ('backend.layouts.app')

@section ('title', __('labels.backend.system.depositions.management') . ' | ' . __('labels.backend.system.depositions.create'))

@section('breadcrumb-links')
    @include('backend.system.deposition.includes.breadcrumb-links')
@endsection

@section('content')
    @include('backend.system.deposition.includes._form')
@endsection
