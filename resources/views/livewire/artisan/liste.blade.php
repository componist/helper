<div>
    <div x-data="{ showMsg: false }" class="container mx-auto">

        <div x-cloak x-show="showMsg" @click.away="showMsg = false"
            class="fixed z-50 max-w-sm overflow-hidden bg-teal-100 border border-teal-300 rounded-md top-3 right-3">
            <p class="flex items-center justify-center p-3 text-teal-600">Copied to Clipboard</p>
        </div>


        @foreach ($content as $key => $group)
            <p class="mb-2 ml-2 text-2xl font-bold uppercase text-slate-500 mt-14">{{ $key }}</p>
            <div class="grid grid-cols-1 gap-5 p-5 bg-white rounded-md shadow-sm">
                @foreach ($group as $artisan)
                    <div class="flex items-center p-5 rounded-md bg-slate-100 gap-7">
                        <button type="button"
                            class="block px-5 py-1 text-white bg-teal-500 rounded-full shadow-sm hover:bg-teal-600"
                            @click.prevent="navigator.clipboard.writeText('{{ $artisan['name'] }}'), showMsg = true, setTimeout(() => showMsg = false, 1000)">{{ $artisan['name'] }}</button>

                        <p class=" text-slate-600">{{ $artisan['description'] }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
