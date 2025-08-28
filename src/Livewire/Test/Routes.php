<?php

namespace Componist\Helper\Livewire\Test;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Routes extends Component
{
    public array $routes = [];

    public function mount()
    {
        $routeCollection = Route::getRoutes()->get();

        foreach ($routeCollection as $route) {
            $temp = [
                'method' => $route->methods[0],
                'url' => $route->uri,
                'fullUrl' => url($route->uri),
                'dynamicUrl' => false,
                'test' => false,
                'status' => null,
            ];

            if ($route->methods[0] == 'GET') {
                // dump($route);
                if (preg_match('#^[^/]+/[^/]+/[^/]+/[^/]+$#', $route->uri)) {
                    // dump("Dynamische URL erkannt.");
                    $temp['dynamicUrl'] = true;
                    // dump($route->uri);

                } else {
                    $temp['test'] = true;
                    $temp['status'] = null;

                    // try {
                    //     if($response = $this->testRouteReturn($temp['fullUrl'])){
                    //         $temp['status'] = $response->status();
                    //     }
                    // } catch (Exception $e) {
                    //     // dd($e);
                    // }
                }
            }

            $this->routes[] = $temp;
        }
        // dump($this->routes);
        // dd(collect($routeCollection)->toArray());
    }

    public function render()
    {
        return view('miniHelper::livewire.test.routes')->layout('miniHelper::layouts.package');
    }

    private function testRouteReturn(string $route): Response
    {
        return Http::get($route);
    }
}
