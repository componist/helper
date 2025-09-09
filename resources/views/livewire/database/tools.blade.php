<div>
    <div class="container mx-auto">

        <x:miniHelper::block>
            <table class="w-full border border-collapse">
                <tr class="sticky top-0 text-sm font-bold text-white uppercase bg-gray-600">
                    <td class="px-3 py-2 border border-collapse text-nowrap"></td>
                    <td class="px-3 py-2 border border-collapse text-nowrap">Table Name</td>
                </tr>
                <tbody class="text-gray-500">
                    @foreach ($content as $key => $value)
                        <tr class="hover:bg-gray-100 hover:text-gray-900">
                            <td class="px-3 py-2 font-bold text-center border border-collapse">
                                <input type="checkbox" class="w-5 h-5 rounded-md"
                                    wire:model.live="content.{{ $key }}.checked" />
                            </td>
                            <td class="px-3 py-2 font-bold border border-collapse">
                                {{ $value['name'] }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x:miniHelper::block>

        <div class="flex items-center gap-3 mt-7">
            <button type="button" @click.prevent="$wire.clearTables"
                class="px-5 py-1 text-white bg-teal-500 rounded-md hover:bg-teal-600">clear</button>
            <button type="button" @click.prevent="$wire.deleteTables"
                class="px-5 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">delete</button>
        </div>

    </div>
</div>
