@extends ('backend.layouts.app')

@section ('title', __('labels.backend.system.galleries.management') . ' | ' . __('labels.backend.system.galleries.edit'))

@section('breadcrumb-links')
    @include('backend.system.gallery.includes.breadcrumb-links')
@endsection

@section('content')
    @include('backend.system.gallery.includes._video-form', ['model' => $gallery])
@endsection
