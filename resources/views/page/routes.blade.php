<x:miniHelper::layouts.package>
    <div>
        <div class="container px-3 mx-auto ">

            <table class="w-full bg-white border border-collapse">
                <tr class="sticky top-0 text-sm font-bold text-white uppercase bg-gray-600">
                    <td class="px-3 py-2 border border-collapse text-nowrap">HTTP Method</td>
                    <td class="px-3 py-2 border border-collapse text-nowrap">Route</td>
                    <td class="px-3 py-2 border border-collapse text-nowrap">Name</td>
                    <td class="px-3 py-2 border border-collapse text-nowrap">Class Path</td>
                </tr>
                <tbody class="text-gray-500">
                    @foreach ($routeCollection as $value)
                        <tr class="hover:bg-gray-100 hover:text-gray-900">
                            <td class="px-3 py-2 font-bold border border-collapse">
                                @switch($value->methods()[0])
                                    @case('GET')
                                        <span class="text-green-500">GET</span>
                                    @break

                                    @case('POST')
                                        <span class="text-orange-500">POST</span>
                                    @break

                                    @case('PUT')
                                        <span class="text-blue-500">PUT</span>
                                    @break

                                    @case('DELETE')
                                        <span class="text-red-500">DELETE</span>
                                    @break

                                    @default
                                        {{ $value->methods()[0] }}
                                @endswitch
                            </td>
                            <td class="px-3 py-2 text-sm border border-collapse">
                                <a href="{{ url($value->uri()) }}" target="_blank">{{ $value->uri() }}</a>
                            </td>
                            <td class="px-3 py-2 text-sm border border-collapse">{{ $value->getName() }}</td>
                            <td class="px-3 py-2 border border-collapse">{{ $value->getActionName() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</x:miniHelper::layouts.package>
