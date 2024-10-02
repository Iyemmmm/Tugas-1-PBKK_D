<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    <article class="py-8 max-w-screen-md">
        <h2 class="font-bold mb-1 text-3xl tracking-tight text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->author->username }}" class="hover:underline"> {{ $post->author->name }}</a>
            <a href="/categories/{{ $post->category->name_category }}" class="hover:underline"> in {{ $post->category->name_category }}</a>
            | {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Read More</a>
    </article>

</x-layout>
