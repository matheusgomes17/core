@extends ('backend.layouts.app')

@section ('title', __('labels.backend.system.depositions.management'))

@section('breadcrumb-links')
    @include('backend.system.deposition.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.system.depositions.management') }} <small class="text-muted">{{ __('labels.backend.system.depositions.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-6">
                @include('backend.system.deposition.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.system.depositions.table.cover') }}</th>
                        <th>{{ __('labels.backend.system.depositions.table.name') }}</th>
                        <th>{{ __('labels.backend.system.depositions.table.created') }}</th>
                        <th>{{ __('labels.backend.system.depositions.table.city_and_state') }}</th>
                        <th>{{ __('labels.backend.system.depositions.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($depositions as $deposition)
                            <tr>
                                <td>{!! $deposition->photo !!}</td>
                                <td>{{ $deposition->name }}</td>
                                <td>{{ $deposition->created_at }}</td>
                                <td>{{ $deposition->cityAndState }}</td>
                                <td>{{ $deposition->updated_at }}</td>
                                <td>{!! $deposition->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $depositions->total() !!} {{ trans_choice('labels.backend.system.depositions.table.total', $depositions->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $depositions->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
