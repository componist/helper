<?php

namespace Componist\Helper\Livewire;

use Componist\Helper\Class\Color;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class DatabaseSchema extends Component
{
    /** @var array<mixed> */
    public array $content = [];

    public function mount(): void
    {
        // Color::getRandomColorName();

        foreach (DB::select('SHOW TABLES') as $table) {
            $tableName = implode(',', json_decode(json_encode($table), true));

            $fields = json_decode(json_encode(DB::select('SHOW COLUMNS FROM `'.$tableName.'` ')), true);

            $this->content[] = [
                'table' => $tableName,
                'fields' => $fields,
            ];
        }
    }

    public function render(): View
    {
        return view('miniHelper::livewire.database-schema')->layout('miniHelper::layouts.package');
    }

    // private function relations()
    // {
    //     foreach ($this->content as $key => $table) {

    //         $tableName = substr_replace($table['table'], '', -1);

    //         dump($tableName);

    //         $this->content[$key]['relations'] = null;

    //         // dd($table['table']);

    //         foreach ($table['fields'] as $field) {

    //             foreach ($this->content as $tempTable) {

    //                 foreach ($tempTable['fields'] as $tempField) {
    //                     // dump($tempField);
    //                     if (str_contains(substr_replace($tempTable['table'], '', -1).'_id', $field['Field'])) {
    //                         dump('#####################');
    //                         dump($tableName);
    //                         dd($tempField['Field']);
    //                         // if (str_contains($tempField['Field'], $field['Field'])) {

    //                         //     $this->content[$key]['relations'][] = [
    //                         //         $field['Field'],
    //                         //         $tempField['Field'],
    //                         //     ];
    //                         // }

    //                         // dump($tempField);
    //                     }
    //                 }
    //             }

    //         }
    //         // dd($table);
    //     }
    // }
}
