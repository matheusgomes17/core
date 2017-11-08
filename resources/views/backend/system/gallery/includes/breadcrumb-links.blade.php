<li class="breadcrumb-menu d-md-down-none">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('menus.backend.system.galleries.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.system.gallery.index') }}">{{ __('menus.backend.system.galleries.all') }}</a>
                <a class="dropdown-item" href="{{ route('admin.system.gallery.create') }}">{{ __('menus.backend.system.galleries.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.system.gallery.image.create') }}">{{ __('menus.backend.system.galleries.image.create') }}</a>
                <a class="dropdown-item" href="{{ route('admin.system.gallery.video.create') }}">{{ __('menus.backend.system.galleries.video.create') }}</a>
            </div>
        </div><!--dropdown-->
    </div><!--btn-group-->
</li>