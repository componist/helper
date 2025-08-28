<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all components that should be loaded for your app.
    | By default all components from Blade UI Kit are loaded in. You can
    | disable or overwrite any component class or alias that you want.
    |
     */

    'components' => [
        'miniHelper::layouts.package' => Componist\Helper\View\PackageLayout::class,
    ],
    /*
    |--------------------------------------------------------------------------
    | Livewire Components
    |--------------------------------------------------------------------------
    |
    | Below you reference all the Livewire components that should be loaded
    | for your app. By default all components from Blade UI Kit are loaded in.
    |
     */

    'livewire' => [
        'model' => \Componist\Helper\Livewire\Model::class,
        'validation' => \Componist\Helper\Livewire\Validation::class,
        'search.string-in-files' => \Componist\Helper\Livewire\Search\StringInFiles::class,
        'create.migration' => \Componist\Helper\Livewire\Create\Migration::class,
        'create.view' => \Componist\Helper\Livewire\Create\View::class,
        'database.schema' => \Componist\Helper\Livewire\Database\Schema::class,
        'root-components.index' => \Componist\Helper\Livewire\RootComponents\Index::class,
        'database.tools' => \Componist\Helper\Livewire\Database\Tools::class,
        'test.routes' => \Componist\Helper\Livewire\Test\Routes::class,
        'crawler.routes-json' => \Componist\Helper\Livewire\Crawler\RoutesJson::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Components Prefix
    |--------------------------------------------------------------------------
    |
    | This value will set a prefix for all Blade UI Kit components.
    | By default it's empty. This is useful if you want to avoid
    | collision with components from other libraries.
    |
    | If set with "buk", for example, you can reference components like:
    |
    | <x-buk-easy-mde />
    |
     */

    'prefix' => '',

    /*
    |--------------------------------------------------------------------------
    | Third Party Asset Libraries
    |--------------------------------------------------------------------------
    |
    | These settings hold reference to all third party libraries and their
    | asset files served through a CDN. Individual components can require
    | these asset files through their static `$assets` property.
    |
     */

    'assets' => [],

];
