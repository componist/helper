<?php

namespace Componist\Helper\View;

use Illuminate\View\Component;
use Illuminate\View\View;

class PackageLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('miniHelper::layouts.package');
    }
}
