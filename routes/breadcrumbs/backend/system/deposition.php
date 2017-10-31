<?php

Breadcrumbs::register('admin.system.deposition.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('labels.backend.system.depositions.management'), route('admin.system.deposition.index'));
});

Breadcrumbs::register('admin.system.deposition.deleted', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.system.deposition.index');
    $breadcrumbs->push(__('menus.backend.system.depositions.deleted'), route('admin.system.deposition.deleted'));
});

Breadcrumbs::register('admin.system.deposition.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.system.deposition.index');
    $breadcrumbs->push(__('labels.backend.system.depositions.create'), route('admin.system.deposition.create'));
});

Breadcrumbs::register('admin.system.deposition.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.system.deposition.index');
    $breadcrumbs->push(__('menus.backend.system.depositions.view'), route('admin.system.deposition.show', $id));
});

Breadcrumbs::register('admin.system.deposition.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.system.deposition.index');
    $breadcrumbs->push(__('menus.backend.system.depositions.edit'), route('admin.system.deposition.edit', $id));
});
