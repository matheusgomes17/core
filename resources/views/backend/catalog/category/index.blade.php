@extends ('backend.layouts.app')

@section ('title', __('labels.backend.catalog.categories.management'))

@section('breadcrumb-links')
    @include('backend.catalog.category.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.catalog.categories.management') }} <small class="text-muted">{{ __('labels.backend.catalog.categories.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-6">
                @include('backend.catalog.category.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.catalog.categories.table.name') }}</th>
                        <th>{{ __('labels.backend.catalog.categories.table.created_at') }}</th>
                        <th>{{ __('labels.backend.catalog.categories.table.category_parent') }}</th>
                        <th>{{ __('labels.backend.catalog.categories.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                <td>{{ $category->email }}</td>
                                <td>{{ $category->updated_at->diffForHumans() }}</td>
                                <td>{!! $category->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $categories->total() !!} {{ trans_choice('labels.backend.catalog.categories.table.total', $categories->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $categories->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
