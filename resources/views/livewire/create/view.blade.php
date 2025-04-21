<div>
    <div class="container px-3 mx-auto py-7">
        <div class="mb-14">
            <label class="block mb-3">Tabelle</label>
            <select size="1" wire:model.live.debounce.500ms="table" wire:change='getTable($event.target.value)'
                class="px-5 py-2 bg-gray-100 rounded-md">
                <option value=""></option>
                @foreach ($table_list as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div>

            @if ($fields)
                <div class="p-5 text-gray-700 bg-gray-100 rounded-lg">
                    <code>
                        @foreach ($fields as $field)
                            {{ $field['html'] }}<br />
                        @endforeach
                    </code>

                </div>
            @endif

        </div>

    </div>

</div>
