<div>
    <div class="container p-5 mx-auto bg-white rounded-lg shadow-sm">
        <div class="flex gap-3 mb-7">
            <input type="text" class="w-full px-5 py-2 bg-gray-100 rounded-md " placeholder="Search String"
                wire:model.live="search" />

            <button type="button" wire:click="searchInFiles"
                class="px-5 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Suchen</button>
        </div>

        @if (count($founds) >= 1)
            <p class="text-center mb-7"><b>Result:</b> {{ count($founds) }}</p>

            <ul class="divide-y divide-gray-200">
                @foreach ($founds as $found)
                    <li x-data="{ open: false }" class="">
                        <div @click.prevent="open = ! open"
                            class="py-3  cursor-pointer hover:bg-gray-100 hover:text-gray-800">
                            <span class="py-2"><b>File path: </b>{{ $found['path'] }}</span>
                        </div>
                        <div x-show="open">
                            <div class="p-2 mt-2 overflow-hidden bg-gray-100 border">
                                <code class="block overflow-auto">
                                    <pre>{{ $found['content'] }}</pre>
                                </code>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
