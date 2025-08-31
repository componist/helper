<div>
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-5 p-5 bg-white rounded-md shadow-sm text-slate-600">
            @foreach ($content as $job)
                <div class="p-5 rounded-md bg-slate-100 gap-7">
                    <div class="flex items-center justify-between gap-5">
                        <div>
                            <p>Namespace: <b>{{ $job['namespace'] }}</b></p>
                            <p>Class: <b>{{ $job['class'] }}</b></p>
                        </div>
                        <div>
                            <button type="button" wire:click="runJob({{ json_encode($job) }})"
                                class="px-3 py-1 text-white bg-teal-500 rounded-md hover:bg-teal-600">Start Job</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
