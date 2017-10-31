<li class="breadcrumb-menu d-md-down-none">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.catalog.products.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.catalog.product.index') }}">{{ __('menus.backend.catalog.products.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.catalog.product.create') }}">{{ __('menus.backend.catalog.products.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.catalog.product.deactivated') }}">{{ __('menus.backend.catalog.products.deactivated') }}</a>
                <a class="dropdown-item" href="{{ route('admin.catalog.product.deleted') }}">{{ __('menus.backend.catalog.products.deleted') }}</a>
            </div>
        </div><!--dropdown-->
    </div><!--btn-group-->
</li>