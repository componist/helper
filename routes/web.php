<?php

use Illuminate\Support\Facades\Route;

if (env('APP_DEBUG') === true) {
    Route::
    // middleware(['auth','verified'])->
    prefix('helper')->name('componist.mini-helper.')->group(function () {
        Route::view('/', 'miniHelper::page.helper')->name('index');
        Route::get('/mode', \Componist\Helper\Livewire\Model::class)->name('model');
        Route::get('/validation', \Componist\Helper\Livewire\Validation::class)->name('validation');
        Route::get('/search/string', \Componist\Helper\Livewire\Search\StringInFiles::class)->name('search.string');
        Route::get('/create/migration', \Componist\Helper\Livewire\Create\Migration::class)->name('create.migration');
        Route::get('/create/view', \Componist\Helper\Livewire\Create\View::class)->name('create.view');

        Route::get('icons', \Componist\Helper\Livewire\RootComponents\Index::class)->name('root.icons');

        Route::prefix('database')->name('database.')->group(function () {
            Route::get('tools', \Componist\Helper\Livewire\Database\Tools::class)->name('tools');
            Route::get('schema', \Componist\Helper\Livewire\Database\Schema::class)->name('schema');
        });

        Route::get('crawler/route', \Componist\Helper\Livewire\Crawler\RoutesJson::class)->name('crawler.route.json');

        Route::get('artisan/list', \Componist\Helper\Livewire\Artisan\Liste::class)->name('artisan.list');

        Route::get('job/liste', \Componist\Helper\Livewire\Jobs\Liste::class)->name('job.liste');

        Route::prefix('test')->name('test.')->group(function () {
            Route::get('routes', \Componist\Helper\Livewire\Test\Routes::class)->name('routes');
        });

        Route::prefix('setting')->name('setting.')->group(function () {
            Route::get('env', \Componist\Helper\Livewire\Setting\EnvFile::class)->name('env');
        });

        Route::view('grug', 'miniHelper::page.grud')->name('grud');
        Route::view('rest-api', 'miniHelper::page.rest-api')->name('rest-api');
        Route::view('pest-exampels', 'miniHelper::page.pest-exampels')->name('pest-exampels');

        Route::get('routes', function () {
            $routeCollection = Route::getRoutes();

            return view('miniHelper::page.routes', compact('routeCollection'));
        })->name('routes');
    });
}
