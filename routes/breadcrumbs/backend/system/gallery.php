<?php

Breadcrumbs::register('admin.system.gallery.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.system.galleries.management'), route('admin.system.gallery.index'));
});

Breadcrumbs::register('admin.system.gallery.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.system.gallery.index');
    $breadcrumbs->push(__('labels.backend.system.galleries.create'), route('admin.system.gallery.create'));
});

Breadcrumbs::register('admin.system.gallery.image.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.system.gallery.create');
    $breadcrumbs->push(__('labels.backend.system.galleries.image.create'), route('admin.system.gallery.image.create'));
});

Breadcrumbs::register('admin.system.gallery.video.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.system.gallery.create');
    $breadcrumbs->push(__('labels.backend.system.galleries.video.create'), route('admin.system.gallery.video.create'));
});

Breadcrumbs::register('admin.system.gallery.image.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.system.gallery.index');
    $breadcrumbs->push(__('menus.backend.system.galleries.image.view'), route('admin.system.gallery.image.show', $id));
});

Breadcrumbs::register('admin.system.gallery.video.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.system.gallery.index');
    $breadcrumbs->push(__('menus.backend.system.galleries.video.view'), route('admin.system.gallery.video.show', $id));
});

Breadcrumbs::register('admin.system.gallery.image.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.system.gallery.index');
    $breadcrumbs->push(__('menus.backend.system.galleries.image.edit'), route('admin.system.gallery.image.edit', $id));
});

Breadcrumbs::register('admin.system.gallery.video.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.system.gallery.index');
    $breadcrumbs->push(__('menus.backend.system.galleries.video.edit'), route('admin.system.gallery.video.edit', $id));
});
