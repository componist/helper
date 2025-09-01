<div>
    <div class="container mx-auto">
        <div>
            <x:miniHelper::form.lable>Table</x:miniHelper::form.lable>
            <x:miniHelper::form.select size="1" wire:model.live.debounce.500ms="table"
                wire:change='getTable($event.target.value)'>
                <option value=""></option>
                @foreach ($table_list as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </x:miniHelper::form.select>

        </div>

        <div class="grid grid-cols-1 gap-5 mt-14">

            @if (isset($fields) && count($fields) >= 1)
                <div class="p-5 bg-gray-100 rounded-md shadow-sm">
                    <h2 class="mb-3 font-bold">Protected $fillable</h2>

                    <pre data-enlighter-language="php">protected $fillable = [
@php
    foreach ($fields as $field) {
        if ($field['Field'] != 'id') {
            echo "\t'" . $field['Field'] . "',\n";
        }
    }
@endphp];</pre>
                </div>

                <div class="p-5 bg-gray-100 rounded-md shadow-sm">
                    <h2 class="mb-3 font-bold">Protected $casts</h2>

                    <pre data-enlighter-language="php">/**
* The attributes that should be cast to native types.
*
* @var array &lt;string, string&gt;
*/
protected $casts = [
@php
    foreach ($fields as $field) {
        $string = "\t";
        $string .= '\'' . $field['Field'] . '\' => \'';

        if (strstr($field['Type'], 'bigint') or strstr($field['Type'], 'int')) {
            $string .= 'integer';
        }

        if (strstr($field['Type'], 'varchar')) {
            $string .= 'string';
        }

        if (strstr($field['Type'], 'text') or strstr($field['Type'], 'longtext')) {
            $string .= 'string';
        }

        if (strstr($field['Type'], 'double')) {
            $string .= 'double';
        }

        if (strstr($field['Type'], 'timestamp') or strstr($field['Type'], 'date')) {
            $string .= 'datetime';
        }

        if (strstr($field['Type'], 'float')) {
            $string .= 'float';
        }

        $string .= '\',';

        echo $string . "\n";
    }
@endphp];</pre>
                </div>
            @endif
        </div>




    </div>

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.hook('morph.updated', ({
                el,
                component
            }) => {
                //
                EnlighterJS.init('pre', 'code', {
                    language: 'javascript,php, html, css',
                    theme: 'dracula',
                    indent: 2
                });
            })
        })
    </script>
</div>
