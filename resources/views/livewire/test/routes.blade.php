<div>
    <div x-data="{
        routes: {{ json_encode($routes) }},
        method: null,
    }">

        <div class="container mx-auto">
            <div>
                <div>
                    <x:miniHelper::form.lable>Methode</x:miniHelper::form.lable>
                    <x:miniHelper::form.select x-model="method">
                        <option value=""></option>
                        <option value="GET">GET</option>
                        <option value="POST">POST</option>
                        <option value="DELETE">DELETE</option>
                        <option value="PUT">PUT</option>
                        <option value="PATCH">PATCH</option>
                        <option value="HEAD">HEAD</option>
                        <option value="OPTIONS">OPTIONS</option>
                        <option value="TRACE">TRACE</option>
                        <option value="CONNECT">CONNECT</option>
                    </x:miniHelper::form.select>
                </div>
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-5 py-1 uppercase">method</th>
                        <th class="px-5 py-1 text-left uppercase">url</th>
                        <th class="px-5 py-1 uppercase">status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($routes as $route)
                        <tr class="group hover:bg-slate-100">
                            @switch($route['method'])
                                @case('GET')
                                    <td class="px-5 py-1 text-center text-white bg-green-500 group-hover:bg-green-600">
                                        {{ $route['method'] }}</td>
                                @break

                                @case('POST')
                                    <td class="px-5 py-1 text-center text-white bg-blue-500 group-hover:bg-blue-600">
                                        {{ $route['method'] }}</td>
                                @break

                                @case('PUT')
                                    <td class="px-5 py-1 text-center text-white bg-orange-500 group-hover:bg-orange-600">
                                        {{ $route['method'] }}</td>
                                @break

                                @case('DELETE')
                                    <td class="px-5 py-1 text-center text-white bg-red-500 group-hover:bg-red-600">
                                        {{ $route['method'] }}</td>
                                @break

                                @default
                                    <td class="px-5 py-1 text-center text-white bg-slate-500 group-hover:bg-slate-600">
                                        {{ $route['method'] }}</td>
                                @break
                            @endswitch

                            <td><a href="{{ $route['fullUrl'] }}" target="_blank"
                                    class="px-5 py-1 hover:text-teal-500">{{ $route['url'] }}</a></td>
                            <td>{{ $route['status'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
