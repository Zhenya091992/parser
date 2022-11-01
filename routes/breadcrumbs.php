<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('main', function (BreadcrumbTrail $trail) {
    $trail->push('Main', route('main'));
});

Breadcrumbs::for('Category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('main');
    $trail->push('Categories', route('Category.index'));
});

Breadcrumbs::for('Category.show', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('Category.index');
    $trail->push('show ' . $category->name_category, route('Category.show', $category));
});

Breadcrumbs::for('Category.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('Category.index');
    $trail->push('edit ' . $category->name_category, route('Category.edit', $category));
});

Breadcrumbs::for('Category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('Category.index');
    $trail->push('create', route('Category.create'));
});

Breadcrumbs::for('registerForm', function (BreadcrumbTrail $trail) {
    $trail->parent('main');
    $trail->push('Registration', route('registerForm'));
});

Breadcrumbs::for('loginForm', function (BreadcrumbTrail $trail) {
    $trail->parent('main');
    $trail->push('Sign in', route('loginForm'));
});

Breadcrumbs::for('cabinet', function (BreadcrumbTrail $trail, $userName) {
    $trail->parent('main');
    $trail->push('Cabinet ' . $userName, route('cabinet', $userName));
});
