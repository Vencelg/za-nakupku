@extends('layout.app')
@section('content')
    <x-navigation/>
    <main style="margin-top: 40px">
        <div class="xl:ml-[240px]">
            <div class="mx-auto w-full">
                <div class="w-full h-full" style="max-height: 100vh; overflow-y: scroll">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:pl-6 lg:pl-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            ID
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            User ID
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Category ID
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Created At
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 text-left">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listings as $listing)
                                        <tr class="border-b hover:bg-green-50 transition-all">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{$listing->id}}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <a href="{{ route('user.detail', ['id' => $listing->user_id]) }}" class="text-green-500
                                        hover:text-green-600">{{$listing->user_id}}</a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <a href="{{ route('category.detail', ['id' => $listing->category_id]) }}"
                                                   class="text-green-500
                                        hover:text-green-600">{{$listing->category_id}}</a>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$listing->name}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{$listing->created_at}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light whitespace-nowrap">
                                                <a href="{{ route('listing.detail', ['id' => $listing->id]) }}">
                                                    <button type="button"
                                                            class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out">
                                                        Detail
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
