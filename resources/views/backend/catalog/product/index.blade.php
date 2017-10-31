@extends ('backend.layouts.app')

@section ('title', __('labels.backend.catalog.products.management'))

@section('breadcrumb-links')
    @include('backend.catalog.product.includes.breadcrumb-links')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.catalog.products.management') }} <small class="text-muted">{{ __('labels.backend.catalog.products.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.catalog.product.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{ __('labels.backend.catalog.products.table.name') }}</th>
                        <th>{{ __('labels.backend.catalog.products.table.category') }}</th>
                        <th>{{ __('labels.backend.catalog.products.table.created') }}</th>
                        <th>{{ __('labels.backend.catalog.products.table.status') }}</th>
                        <th>{{ __('labels.backend.catalog.products.table.qtd') }}</th>
                        <th>{{ __('labels.backend.catalog.products.table.last_updated') }}</th>
                        <th>{{ __('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>{!! $product->status_label  !!}</td>
                                <td>{!! $product->sold_label !!}</td>
                                <td>{{ $product->updated_at }}</td>
                                <td>{!! $product->action_buttons !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $products->total() !!} {{ trans_choice('labels.backend.catalog.products.table.total', $products->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $products->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
