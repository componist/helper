<div>
    <div class="container px-3 mx-auto py-7">
        <div class="grid grid-cols-1 gap-5 mb-14">
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
            <div class="flex items-end gap-5">
                <div class="w-full">
                    <label class="block mb-3">API URL</label>
                    <input type="text" wire:model.live='url' class="w-full px-5 py-2 bg-gray-100 rounded-md" />
                </div>

                @if ($url)
                    <button type="button" @click.prevent="$wire.getApiData"
                        class="px-5 py-2 text-white bg-teal-500 rounded-md hover:bg-teal-600">
                        CALL
                    </button>
                @else
                    <button type="button" disabled class="px-5 py-2 text-white rounded-md bg-slate-300">
                        CALL
                    </button>
                @endif

            </div>
        </div>

        <div>
            {{-- @if (session()->has('save'))
                <div class="p-5 text-white bg-green-500 ">{{ session('save') }}</div>
            @endif --}}

            @if (!empty($stub))
                <div class="relative">
                    <div class="p-5 text-gray-700 bg-gray-100 rounded-lg">
                        <pre><code>{{ $stub }}</code></pre>
                    </div>

                    @if (session()->has('save'))
                        <button type="button"
                            class="absolute z-20 p-1 text-white bg-green-500 border-2 border-green-500 rounded-md top-5 right-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="9 11 12 14 22 4"></polyline>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                            </svg>
                        </button>
                    @else
                        <button type="button" wire:click='createFile'
                            class="absolute z-20 p-1 text-blue-500 border-2 border-blue-500 rounded-md hover:text-white hover:bg-blue-500 top-5 right-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                                <polyline points="7 3 7 8 15 8"></polyline>
                            </svg>
                        </button>
                    @endif


                </div>
            @endif
        </div>

        {{-- <div>
            @php
                print '<pre>';
                print_r($database);
                print '</pre>';
            @endphp
        </div> --}}
    </div>
</div>
