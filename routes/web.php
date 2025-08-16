<?php

use Illuminate\Support\Facades\Route;

if (env('APP_DEBUG') === true) {
    Route::
    //middleware(['auth','verified'])->
    prefix('helper')->name('componist.mini-helper.')->group(function () {
        Route::view('/', 'miniHelper::page.helper')->name('index');
        Route::get('/mode', \Componist\Helper\Livewire\Model::class)->name('model');
        Route::get('/validation', \Componist\Helper\Livewire\Validation::class)->name('validation');
        Route::get('/search/string', \Componist\Helper\Livewire\Search\StringInFiles::class)->name('search.string');
        Route::get('/create/migration', \Componist\Helper\Livewire\Create\Migration::class)->name('create.migration');
        Route::get('/create/view', \Componist\Helper\Livewire\Create\View::class)->name('create.view');
        Route::get('database-schema', \Componist\Helper\Livewire\DatabaseSchema::class)->name('database.schema');
        Route::get('icons',\Componist\Helper\Livewire\RootComponents\Index::class)->name('root.icons');

        Route::view('grug', 'miniHelper::page.grud')->name('grud');
        Route::view('rest-api', 'miniHelper::page.rest-api')->name('rest-api');
        Route::view('pest-exampels', 'miniHelper::page.pest-exampels')->name('pest-exampels');

        Route::get('routes', function () {
            $routeCollection = Route::getRoutes();

            return view('miniHelper::page.routes', compact('routeCollection'));
        })->name('routes');
    });
}