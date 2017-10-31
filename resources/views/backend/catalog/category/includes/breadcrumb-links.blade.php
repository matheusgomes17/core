<li class="breadcrumb-menu d-md-down-none">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.catalog.categories.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.catalog.category.index') }}">{{ __('menus.backend.access.users.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.catalog.category.create') }}">{{ __('menus.backend.access.users.create') }}</a>
            </div>
        </div><!--dropdown-->
    </div><!--btn-group-->
</li>