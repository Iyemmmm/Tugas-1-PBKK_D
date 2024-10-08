<x-layout>
    <x-slot:title>
        {{ $title }}
    </x-slot:title>
    {{-- <article class="py-8 max-w-screen-md">
        <h2 class="font-bold mb-1 text-3xl tracking-tight text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="/authors/{{ $post->author->username }}" class="hover:underline"> {{ $post->author->name }}</a>
            <a href="/categories/{{ $post->category->name_category }}" class="hover:underline"> in {{ $post->category->name_category }}</a>
            | {{ $post->created_at->diffForHumans() }}
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Read More</a>
    </article> --}}

    <!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->

    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to Post</a>
                <header class="mb-4 lg:mb-6 not-format mt-4">
                    <address class="inline-flex mr-3 items-center mb-6 not-italic">
                        <div
                            class="inline-flex items-center justify-content-between mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            </img>
                            <div>
                                <div class="flex items-center">
                                    <a href="/authors/{{ $post->author->username }}" rel="author"
                                        class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                                    <a href="/categories/{{ $post->category->name_category }}">
                                        <span
                                            class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800 mx-4">
                                            {{ $post->category->name_category }}
                                        </span>
                                    </a>
                                </div>
                                <p class="text-base text-gray-500 dark:text-gray-400">
                                    {{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-2xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-3xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>
                <p class="lead">{{ $post->body }}
                </p>
            </article>
        </div>
    </main>



</x-layout>
