<?php

namespace Componist\Helper\Livewire\Setting;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class EnvFile extends Component
{
    public string $path = '';
    public string $content = '';


    public function mount()
    {
        $this->path = base_path('.env');

        if (File::exists($this->path)) {
            $this->content = File::get($this->path);
        }
    }
    
    public function render()
    {
        return view('miniHelper::livewire.setting.env-file')->layout('miniHelper::layouts.package');
    }
}