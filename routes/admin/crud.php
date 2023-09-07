<?php

use BytePlatform\Cms\Crud\CatalogCrud;
use BytePlatform\Cms\Crud\PageCrud;
use BytePlatform\Cms\Crud\PostCrud;
use BytePlatform\Cms\Crud\TagCrud;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    PageCrud::RoutePage('page');
    TagCrud::RoutePage('tag');
    CatalogCrud::RoutePage('catalog');
    PostCrud::RoutePage('post');
});
