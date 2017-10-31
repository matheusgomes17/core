<?php

Breadcrumbs::register('admin.catalog.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.catalog.categories.management'), route('admin.catalog.category.index'));
});

Breadcrumbs::register('admin.catalog.category.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.catalog.category.index');
    $breadcrumbs->push(__('menus.backend.catalog.categories.deleted'), route('admin.catalog.category.deleted'));
});

Breadcrumbs::register('admin.catalog.category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.catalog.category.index');
    $breadcrumbs->push(__('labels.backend.catalog.categories.create'), route('admin.catalog.category.create'));
});

Breadcrumbs::register('admin.catalog.category.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.catalog.category.index');
    $breadcrumbs->push(__('menus.backend.catalog.categories.edit'), route('admin.catalog.category.edit', $id));
});