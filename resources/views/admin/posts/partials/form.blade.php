{{ Form::hidden('user_id', auth()->id()) }}

<div class="mb-4">
    {{ Form::label('category_id', 'Categorias', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
    {{ Form::select('category_id',$categories, null, [
        'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'.( $errors->has('category_id') ? ' border border-red-500' : '' )
        ]) }}
    @error('category_id') <span class="text-red-500">{{ $message }}</span>@enderror
</div>

<div class="mb-4">
    {{ Form::label('name', 'Nombre del post', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
    {{ Form::text('name', null, [
        'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'.( $errors->has('name') ? ' border border-red-500' : '' ),
        'placeholder' => 'Ingrese el nombre del post'
        ]) }}
    @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
</div>

<div class="mb-4">
    {{ Form::label('slug', 'Slug', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
    {{ Form::text('slug', null, [
        'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'.( $errors->has('slug') ? ' border border-red-500' : '' ),
        'placeholder' => 'Ingrese el slug del post'
        ]) }}
    @error('slug') <span class="text-red-500">{{ $message }}</span>@enderror
</div>

<div class="mb-4">
    {{ Form::label('file', 'Imagen', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
    {{ Form::file('file') }}
</div>

<div class="mb-4">
    {{ Form::label('status', 'Stado', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
    <label>
        {{ Form::radio('status', 'PUBLISHED') }} Publicado
    </label>
    <label>
        {{ Form::radio('status', 'DRAFT') }} Borrador
    </label>
</div>

<div class="mb-4">
    {{ Form::label('tags', 'Etiquetas', ['class' => 'block text-gray-700 text-sm font-bold mb-2'])
 }}
    @foreach($tags as $tag)
        <label>
            {{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
        </label>
    @endforeach
</div>

<div class="mb-4">
    {{ Form::label('excerpt', 'Extracto', ['class' => 'block text-gray-700 text-sm font-bold mb-2'])
 }}
    {{ Form::textarea('excerpt', null, [
        'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'.( $errors->has('excerpt') ? ' border border-red-500' : '' ),
        'placeholder' => 'Ingrese el resumen del post',
        'rows' => 2,
        'style' => 'resize:none'
        ]) }}
</div>
<div class="mb-4">
    {{ Form::label('body', 'Body', ['class' => 'block text-gray-700 text-sm font-bold mb-2']) }}
    {{ Form::textarea('body', null, [
        'class' => 'shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline'.( $errors->has('body') ? ' border border-red-500' : '' ),
        'placeholder' => 'Ingrese el body del post',
        'rows' => 4,
        'style' => 'resize:none'
        ]) }}
    @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
</div>
<div class="mb-4">
    {{ Form::submit('Guardar', ['class' => 'bg-red-400 font-bold text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-red-600 rounded-full mx-2']) }}
    <a href="{{ route('posts.index') }}" class="bg-gray-400 font-bold text-white px-4 py-2 transition duration-300 ease-in-out hover:bg-gray-600 rounded-full mx-2">Cancelar</a>
</div>

@section('scripts')
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#name").keyup(function(){
                var cadena = $(this).val();
                string_to_slug(cadena);
            });
        });


        function string_to_slug (str) {
            str = str.replace(/^\s+|\s+$/g, '');
            str = str.toLowerCase();

            //quita acentos, cambia la ñ por n, etc
            var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
            var to   = "aaaaeeeeiiiioooouuuunc------";

            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // quita caracteres invalidos
                .replace(/\s+/g, '-') // reemplaza los espacios por -
                .replace(/-+/g, '-'); // quita las plecas

            return $("#slug").val(str);
        }

        /***************- CKEditor -******************/
        ClassicEditor
            .create(document.querySelector('#body'))
                .catch(error => {
                    console.error(error);
                });
    </script>
@endsection
