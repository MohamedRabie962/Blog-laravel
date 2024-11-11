<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-lg">
                        {!! $post->body !!}
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium">Comments</h3>
                        <div class="space-y-4 mt-4">
                            @foreach ($comments as $comment)
                                <div>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <img class="h-10 w-10 rounded-full" src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $comment->user->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-700">
                                        {{ $comment->body }}
                                    </div>

                                    <div class="mt-2">
                                        <form action="{{ route('replies.store', $comment) }}" method="POST" class="flex items-center">
                                            @csrf
                                            <input type="text" name="body" placeholder="Add a reply..." class="flex-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            <button type="submit" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                                Reply
                                            </button>
                                        </form>
                                        <div class="mt-2 ml-16 space-y-4">
                                            @foreach ($comment->replies as $reply)
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-8 w-8 rounded-full" src="{{ $reply->user->profile_photo_url }}" alt="{{ $reply->user->name }}">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $reply->user->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $reply->created_at->diffForHumans() }}
                                                        </div>
                                                        <div class="mt-1 text-sm text-gray-700">
                                                            {{ $reply->body }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="text-lg font-medium">Leave a Comment</h3>
                        <form action="{{ route('comments.store', $post->slug) }}" method="POST" class="mt-4 space-y-4">
                            @csrf
                            <div>
                                <textarea name="body" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Write your comment..."></textarea>
                                @error('body')
                                <div class="text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex justify-end">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
