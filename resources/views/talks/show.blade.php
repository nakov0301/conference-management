<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $talk->title }}
        </h2>
        <p>{{ $talk->description }}</p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-bold text-2xl">Comments: </h2>
                    <ul>
                        @foreach($talk->comments as $comment)
                            <li class="flex gap-4 justify-between">
                                <p>
                                    {{ $comment->comment }} <br>
                                    <span class="text-sm text-gray-500 italic">by {{ $comment->user->name }}</span>
                                </p>
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <form method="post" action="{{ route('talks.comment', $talk) }}">
                        @csrf

                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="col-span-full">
                                        <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Comment</label>
                                        <div class="mt-2">
                                            <textarea name="comment" id="comment" placeholder="Leave a comment here.."
                                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                                        </div>
                                        @error('comment')
                                        <p class="text-red-400 font-semibold text-xs">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
