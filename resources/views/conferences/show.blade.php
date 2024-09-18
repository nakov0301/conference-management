<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $conference['title'] }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h2 class="font-bold text-2xl">Talks: </h2>
                        <a class="text-blue-400 underline" href="{{ route('talks.create', $conference) }}">Submit a talk</a>
                    </div>
                    <ul class="mt-6">
                        @foreach($conference['talks'] as $talk)
                            <li class="flex gap-4 mb-4">
                                <a class="underline" href="{{ route('talks.show', $talk) }}">
                                    <span>{{ $talk['title'] }} by {{ $talk['user']['name'] }}</span>
                                </a>

                                @if($talk->approved_at)
                                    <span
                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">Approved</span>
                                @else
                                    <span
                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Not approved yet.</span>

                                    @can('organizer', $conference)
                                        <form method="post" action="{{ route('talks.approve', $talk) }}">
                                            @csrf

                                            <button
                                                class="inline-flex items-center rounded-md bg-green-400 text-white px-2 py-1 text-xs font-medium ring-1 ring-inset ring-green-600/20"
                                                type="submit">
                                                Approve
                                            </button>
                                        </form>
                                    @endcan
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
