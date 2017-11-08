@extends ('backend.layouts.app')

@section ('title', __('labels.backend.system.galleries.management'))

@section('breadcrumb-links')
    @include('backend.system.gallery.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.system.galleries.management') }} <small class="text-muted">{{ __('labels.backend.system.galleries.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-6">
                @include('backend.system.gallery.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.system.galleries.table.id') }}</th>
                        <th>{{ __('labels.backend.system.galleries.table.created') }}</th>
                        <th>{{ __('labels.backend.system.galleries.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{!! $gallery->photo !!}</td>
                                <td>{{ $gallery->created_at }}</td>
                                <td>{{ $gallery->updated_at }}</td>
                                <td>{!! $gallery->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $galleries->total() !!} {{ trans_choice('labels.backend.system.galleries.table.total', $galleries->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $galleries->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
