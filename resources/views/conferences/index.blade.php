<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Conferences') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="text-blue-400 underline" href="{{ route('conferences.create') }}">Add Conference</a>

                    <ul>
                        @foreach($conferences as $conference)
                            <li class="flex justify-between mb-2">
                                <a href="{{ route('conferences.show', $conference['id']) }}">
                                    {{ $conference['title'] }}
                                </a>
                                <div class="flex gap-4">
                                    <a class="text-blue-400 underline"
                                       href="{{ route('conferences.edit', ['id' => $conference['id']]) }}">Edit</a>
                                    <form method="post" action="{{ route('conferences.delete', ['id' => $conference['id']]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-red-600 px-2 rounded-md text-white">Delete</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>