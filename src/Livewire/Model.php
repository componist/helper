<?php

namespace Componist\Helper\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class Model extends Component
{
    /** @var array<mixed> */
    public array $table_list = [];

    public string $table = '';

    /** @var array<mixed> */
    public array $fields = [];

    public function mount(): void
    {
        $this->getTables();
    }

    public function render(): View
    {
        return view('miniHelper::livewire.model')->layout('miniHelper::layouts.package');
    }

    public function getTable(string $table): void
    {
        if (! empty($table)) {
            $this->table = $table;
            $temp = json_decode(json_encode(DB::select('SHOW COLUMNS FROM `'.$table.'` ')), true);

            foreach ($temp as $key => $value) {
                $temp[$key]['checked'] = 0;
                $temp[$key]['faker']['Field'] = $value['Field'];
                $temp[$key]['faker']['type'] = null;
                $temp[$key]['faker']['params'] = null;
                $temp[$key]['faker']['default'] = null;
            }
            $this->fields = $temp;
        }
    }

    private function getTables(): void
    {
        foreach (DB::select('SHOW TABLES') as $value) {
            $this->table_list[] = implode(',', json_decode(json_encode($value), true));
        }
    }
}
