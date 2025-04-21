<?php

namespace Componist\Helper\Livewire\Create;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class View extends Component
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

    public function render()
    {
        return view('miniHelper::livewire.create.view')->layout('miniHelper::layouts.package');
    }

    public function getTable(string $table): void
    {
        if (! empty($table)) {

            $this->table = $table;
            $this->fields = [];

            $temp = json_decode(json_encode(DB::select('SHOW COLUMNS FROM `'.$this->table.'` ')), true);

            foreach ($temp as $value) {

                if ($value['Field'] != 'id') {

                    $data = [
                        'require' => false,
                        'name' => null,
                        'type' => null,
                        'html' => null,
                    ];

                    if ($value['Null'] === 'NO') {
                        $data['require'] = true;
                    }

                    $data['name'] = $value['Field'];

                    if (str_contains($value['Type'], 'int') or str_contains($value['Type'], 'bigint') or str_contains($value['Type'], 'float') or str_contains($value['Type'], 'double')) {
                        $data['type'] = 'number';

                        $data['html'] = '<input type="number" name="'.$value['Field'].'"';

                        if ($value['Null'] === 'NO') {
                            $data['html'] .= ' required';
                        }

                        $data['html'] .= ' />';
                    }

                    if ($value['Type'] == 'text' or $value['Type'] == 'longtext') {
                        $data['type'] = 'textarea';

                        $data['html'] = '<textarea name="'.$value['Field'].'" rows="3" cols="10"';

                        if ($value['Null'] === 'NO') {
                            $data['html'] .= ' required';
                        }

                        $data['html'] .= '></textarea>';
                    }

                    if (str_contains($value['Type'], 'timestamp') or str_contains($value['Type'], 'date')) {
                        $data['type'] = 'date';

                        $data['html'] = '<input type="date" name="'.$value['Field'].'"';

                        if ($value['Null'] === 'NO') {
                            $data['html'] .= ' required';
                        }

                        $data['html'] .= ' />';
                    }

                    if (str_contains($value['Type'], 'varchar')) {
                        $data['type'] = 'text';

                        $data['html'] = '<input type="text" name="'.$value['Field'].'"';

                        if ($value['Null'] === 'NO') {
                            $data['html'] .= ' required';
                        }

                        $data['html'] .= ' />';

                    }

                    $this->fields[] = $data;
                }
            }
        }
    }

    private function getTables(): void
    {
        foreach (DB::select('SHOW TABLES') as $value) {
            $this->table_list[] = implode(',', json_decode(json_encode($value), true));
        }
    }
}
