<?php

namespace Componist\Helper\Livewire\Artisan;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Liste extends Component
{
    public function render()
    {
        $commandListe = [];
        $commands = Artisan::all();

        foreach ($commands as $name => $command) {
            $group = explode(':', $name);

            $commandListe[] = [
                'group' => $group[0],
                'name' => 'php artisan '.$name,
                'description' => $command->getDescription(),
            ];
        }

        $commandListe = collect($commandListe)
            ->groupBy('group')
            ->toArray();

        $content = $commandListe;
        // dump($content);

        return view('miniHelper::livewire.artisan.liste', compact('content'))->layout('miniHelper::layouts.package');
    }
}
