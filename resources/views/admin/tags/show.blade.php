<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Etiquetas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl text-center">Etiqueta: {{ $tag->name }}</h3>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <p><b>Nombre: </b>{{ $tag->name }}</p>
                            <p><b>Slug: </b>{{ $tag->slug }}</p>
                        </div>
                        <a href="{{ route('tags.index') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-900 rounded-full text-white ">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
