<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <div class="relative items-center justify-center">
                            <div class="lg:flex flex-col items-center container mx-auto my-auto">

                                <div
                                    class="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
                                    <h4 class="font-medium text-gray-600 text-lg my-2 uppercase">Categorias</h4>
                                    <a href="{{ route('category', $post->category->slug) }}" class="hover:text-green-400">{{ $post->category->name }}</a>
                                    @if($post->file)
                                        <img src="{{ $post->file }}" alt="" class="overflow-hidden">
                                    @endif
                                    <div class="p-4">
                                        <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">{{ $post->name }}</h3>
                                        <p class="text-justify">{{ $post->excerpt }}</p>
                                        <hr>
                                        {!! $post->body !!}
                                        <hr>
                                        <h4 class="font-medium text-gray-600 text-lg my-2 uppercase">Etiqutas</h4>
                                        @foreach($post->tags as $tag)
                                            <a href="{{ route('tag',$tag->slug) }}" class="hover:text-green-400">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
