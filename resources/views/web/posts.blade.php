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

                            <!-- All Cards Container -->
                            <div class="lg:flex flex-col items-center container mx-auto my-auto">
                            @foreach($posts as $post)
                                <!-- Card 1 -->
                                    <div
                                        class="lg:m-4 shadow-md hover:shadow-lg hover:bg-gray-100 rounded-lg bg-white my-12 mx-8">
                                        <!-- Card Image -->
                                        @if($post->file)
                                            <img src="{{ $post->file }}" alt=""  class="overflow-hidden">
                                        @endif
                                    <!-- Card Content -->
                                        <div class="p-4">
                                            <h3 class="font-medium text-gray-600 text-lg my-2 uppercase">{{ $post->name }}</h3>
                                            <p class="text-justify">{{ $post->excerpt }}</p>
                                            <div class="mt-5">
                                                <a href="#"
                                                   class="hover:bg-gray-700 rounded-full py-2 px-3 font-semibold hover:text-white bg-gray-400 text-gray-100">Read
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                    {{ $posts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
