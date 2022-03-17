<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Url Shortening
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <form action="{{ route('url.shorten') }}" method="POST">
                        @csrf

                        <div class="p-6">
                            <x-input id="destination" class="block mt-1 w-full"
                                     type="text"
                                     name="destination"
                                     required
                                     placeholder="http://example.com"
                                     :value="old('destination')"
                            />
                            <x-label for="destination" value="Enter the url you want to shorten" class="mt-4 ml-1 h-6"/>

                            @if ($errors->any())
                                <div class="bg-red-200 border rounded border-red-300 px-4 py-2">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li class="text-red-700">
                                                <strong>{{ $error }}</strong>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="bg-gray-50 py-5 px-8 flex justify-end">
                            <button class="bg-blue-500 hover:bg-blue-600 text-gray-100 py-2 px-4 rounded">Shorten Url</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-20">
                <div class="bg-white border-b border-gray-200">
                    <table class="shadow-lg bg-white border-collapse w-full">
                        <tr>
                            <th class="bg-blue-100 border px-8 py-4">SLUG</th>
                            <th class="bg-blue-100 border px-8 py-4">URL</th>
                            <th class="bg-blue-100 border px-8 py-4">CREATED AT</th>
                        </tr>
                        @if(count($urls) > 0)
                            @foreach($urls as $url)
                                <tr>
                                    <td class="border px-8 py-4">
                                        <a target="_blank" class="underline" href="{{ $url->shorten_url }}">{{ $url->shorten_url }}</a>
                                    </td>
                                    <td class="border px-8 py-4">
                                        <a target="_blank" class="underline" href="{{ $url->destination }}">{{ $url->destination }}</a>
                                    </td>
                                    <td class="border px-8 py-4">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $url->created_at)->format('m/d/Y, g:i A') }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center py-5 italic font-bold text-gray-400">No Data</td>
                            </tr>
                        @endisset
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
