<div class="container mx-auto">
    <div x-data=""
        @crawler-loop.window="
        if ($wire.entangle('running').live) {
            $wire.crawlStep().then(() => {
                if ($wire.running) {
                    setTimeout(() => window.dispatchEvent(new Event('crawler-loop')), 300);
                }
            });
        }
    ">
        <div class="mb-4">
            <input type="text" wire:model.live="baseUrl" placeholder="{{ url('/') }}"
                class="w-1/2 p-2 border rounded">
            <button wire:click="startCrawler" class="px-4 py-2 text-white bg-blue-500 rounded">
                Start Crawling
            </button>

            <button wire:click="clearJonsFile" class="px-4 py-2 text-white bg-red-500 rounded">
                Clear Json File
            </button>

            <button wire:click="resetCrawler" class="px-4 py-2 text-white bg-orange-500 rounded">Reset Crawler</button>

            <button wire:click="generateSitemap" class="px-4 py-2 text-white bg-green-500 rounded">
                Sitemap erstellen
            </button>

        </div>

        <div class="mb-4">
            Fortschritt: {{ $content['done'] }} / {{ $content['total'] }}
        </div>

        @if ($content['running'])
            <script>
                window.dispatchEvent(new Event('crawler-loop'));
            </script>
            <div class="text-blue-500">Crawler läuft...</div>
        @else
            <div class="text-gray-500">Crawler gestoppt</div>
        @endif

        <table class="w-full bg-white">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-5 py-2 text-left">URL</th>
                    <th class="px-5 py-2 text-center">Status</th>
                    <th class="px-5 py-2 text-center">Besucht</th>
                    <th class="px-5 py-2 text-center">Can visit</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($content['urls'] as $url)
                    <tr>
                        <td class="px-5 py-2 text-left">
                            <a href="{{ $url['url'] }}" target="_blank"
                                class="hover:text-teal-500">{{ $url['url'] }}</a>
                        </td>
                        <td class="px-5 py-2 text-center">

                            @if ($url['status_code'] === 200)
                                <span
                                    class="px-3 py-1 text-white bg-green-500 rounded-md">{{ $url['status_code'] }}</span>
                            @elseif($url['status_code'] === null)
                                -
                            @else
                                <span
                                    class="px-3 py-1 text-white bg-red-500 rounded-md">{{ $url['status_code'] }}</span>
                            @endif
                        </td>
                        <td class="px-5 py-2 text-center">{{ $url['visited'] ? '✔️' : '❌' }}</td>
                        <td class="px-5 py-2 text-center">{{ $url['can_visit'] ? '✔️' : '❌' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
