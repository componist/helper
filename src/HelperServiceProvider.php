<?php

namespace Componist\Helper;

use Componist\Helper\Commands\ClearStoragePublic;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/helper.php', 'configHelper');

        $this->commands([
            ClearStoragePublic::class,
        ]);

        Route::group(['middleware' => ['web']], function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        });

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'miniHelper');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // blade componente
        $this->bootBladeComponents();

        // livewire componente
        $this->bootLivewireComponents();
    }

    private function bootBladeComponents(): void
    {
        foreach (config('configHelper.components', []) as $alias => $component) {
            Blade::component(config('configHelper.prefix').$alias, $component);
        }
    }

    private function bootLivewireComponents(): void
    {
        foreach (config('configHelper.livewire', []) as $alias => $component) {
            Livewire::component(config('configHelper.prefix').$alias, $component);
        }
    }
}
