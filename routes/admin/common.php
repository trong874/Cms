<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.'], function () {
    Route::get('/settings/menu', \BytePlatform\Cms\Livewire\Pages\Menu\Menu::class)->name('menu');
});
