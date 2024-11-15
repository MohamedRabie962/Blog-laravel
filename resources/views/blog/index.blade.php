<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @foreach ($posts as $post)
                        <div class="mt-8 text-2xl">
                            <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                        </div>
                        <div class="mt-6 text-gray-500">
                            {{ $post->excerpt }}
                        </div>
                    @endforeach
                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
