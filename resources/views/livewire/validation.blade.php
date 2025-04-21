<div>
    <div class="container px-3 mx-auto py-7">
        <div>
            <label class="block mb-3">Tabelle</label>
            <select size="1" wire:model.live.debounce.500ms="table" wire:change='getTable($event.target.value)'
                class="px-5 py-2 bg-gray-100 rounded-md">
                <option value=""></option>
                @foreach ($table_list as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>


        <div class="grid grid-cols-1 gap-5 mt-14">

            @if (count($validator) > 0)
                <div class="relative p-5 bg-gray-100 rounded-md shadow-sm">
                    <h2 class="mb-3 font-bold">Request $validated</h2>

                    <pre data-enlighter-language="php">$validated = $request->validate([
                        @foreach ($validator as $fieldName => $value)
'{{ $fieldName }}' => '{{ $value }}',
@endforeach]);
                    </pre>

                </div>
            @endif
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
</div>
