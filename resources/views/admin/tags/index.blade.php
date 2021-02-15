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
                    <div class="flex justify-between items-center">
                        <h3>Listado de etiquetas</h3>
                        <a href="{{ route('tags.create') }}"
                           class="bg-green-500 font-bold text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-green-700 rounded-full">Crear
                            nuevo</a>
                    </div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                <tr>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                        ID
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center">
                                        Slug
                                    </th>
                                    <th
                                        class="flex justify-center px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr class="text-center">
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $tag->id }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $tag->name }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $tag->slug }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex justify-end">
                                            <a href="{{ route('tags.show', $tag->id) }}"
                                               class="bg-blue-400 font-bold text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-blue-500 rounded-full mx-2">Ver</a>
                                            <a href="{{ route('tags.edit',$tag->id) }}"
                                               class="bg-yellow-400 font-bold text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-yellow-600 rounded-full mx-2">Editar</a>
                                            {!! Form::open(['route' => ['tags.destroy', $tag->id], 'method' => 'DELETE']) !!}
                                            <button class="bg-red-400 font-bold text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-red-600 rounded-full mx-2">Eliminar</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div
                                class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                {{ $tags->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
