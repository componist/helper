<?php

namespace Componist\Helper\Livewire\Create;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;

class Migration extends Component
{
    /** @var array<mixed> */
    public array $table_list = [];

    public string $table = '';

    /** @var array<mixed> */
    public array $migration = [];

    public string $stub = '';

    /** @var array<mixed> */
    public array $database = [];

    public function mount(): void
    {
        $this->getTables();
    }

    public function render(): View
    {
        return view('miniHelper::livewire.create.migration')->layout('miniHelper::layouts.package');
    }

    public function createFile(): void
    {
        $name = date('Y_m_d_His_').'create_'.$this->table.'_table.php';
        if (file_put_contents(database_path('migrations').'/'.$name, $this->stub)) {
            session()->flash('save', 'Datei wurde erstellt.');
        }
    }

    public function getTable(string $table): void
    {
        if (! empty($table)) {

            $this->table = $table;

            $this->getStubContent();

            $this->setTableName();

            $temp = json_decode(json_encode(DB::select('SHOW COLUMNS FROM `'.$this->table.'` ')), true);

            $this->database = $temp;

            $this->migration = [
                'table' => $this->table,
                'fields' => [],
            ];

            foreach ($temp as $value) {
                $string = '$table';

                if ($value['Field'] === 'id') {
                    $string .= '->id()';
                } else {

                    if ($value['Type'] == 'int' or str_contains($value['Type'], 'bigint')) {
                        $string .= '->integer(\''.$value['Field'].'\')';
                    }

                    if (str_contains($value['Type'], 'varchar')) {
                        $string .= '->string(\''.$value['Field'].'\')';
                    }

                    if (str_contains($value['Type'], 'tinyint')) {
                        $string .= '->boolean(\''.$value['Field'].'\')';
                    }

                    if (str_contains($value['Type'], 'double') or str_contains($value['Type'], 'float')) {
                        $string .= '->float(\''.$value['Field'].'\')';
                    }

                    if (str_contains($value['Type'], 'longtext')) {
                        $string .= '->longText(\''.$value['Field'].'\')';
                    }

                    if (str_contains($value['Type'], 'date')) {
                        $string .= '->date(\''.$value['Field'].'\')';
                    }

                    if (str_contains($value['Type'], 'binary')) {
                        $string .= '->binary(\''.$value['Field'].'\')';
                    }

                    if (str_contains($value['Type'], 'decimal')) {
                        $string .= '->decimal(\''.$value['Field'].'\')';
                    }

                    if (! empty($value['Default']) or $value['Default'] === '0') {

                        if (str_contains($value['Type'], 'int')) {
                            $string .= '->default('.$value['Default'].')';
                        } else {
                            $string .= '->default(\''.$value['Default'].'\')';
                        }
                    }

                    if ($value['Type'] === 'text' or $value['Type'] === 'mediumtext') {
                        $string .= '->text(\''.$value['Field'].'\')';
                    }

                    if ($value['Type'] === 'timestamp') {
                        $string .= '->timestamp(\''.$value['Field'].'\')';
                    }

                    if ($value['Null'] === 'YES') {
                        $string .= '->nullable()';
                    }

                }
                $string .= ';';

                $this->migration['fields'][] = $string;
            }

            $data = '';

            foreach ($this->migration['fields'] as $loop => $value) {

                if ($loop === array_key_first($this->migration['fields'])) {
                    $data .= $value."\r\n";
                } else {
                    if ($loop === array_key_last($this->migration['fields'])) {
                        $data .= "\t\t\t".$value;
                    } else {
                        $data .= "\t\t\t".$value."\r\n";
                    }
                }
            }

            $this->migration['string'] = $data;

            $this->setFields();

        }
    }

    private function getTables(): void
    {
        foreach (DB::select('SHOW TABLES') as $value) {
            $this->table_list[] = implode(',', json_decode(json_encode($value), true));
        }
    }

    private function getStubContent(): void
    {
        $this->stub = file_get_contents(__DIR__.'../../../stub/create_migration.stub');
    }

    private function setTableName(): void
    {
        $this->stub = str_replace('[table]', '\''.$this->table.'\'', $this->stub);
    }

    private function setFields(): void
    {
        $this->stub = str_replace('[fields]', $this->migration['string'], $this->stub);
    }
}
