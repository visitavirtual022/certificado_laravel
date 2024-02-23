<x-layouts.layout>

    <div class="h-full flex justify-center items-center">

        <form action="/profesores" method="post" class="w-1/3 bg-white p-5 border-blue-500 space-y-10 border-2 rounded-3xl justify-center items-center">
@csrf
            <input type="text" name="nombre" placeholder="Nombre" class="input input-bordered input-info w-full max-w-xs text-xl" />
            @foreach($errors->get("nombre") as $errors)
                <div class="text-sm text-red-600"
                {{$errors}}
            @endforeach
            <input type="text" name="apellidos" placeholder="Apellidos" class="input input-bordered input-info w-full max-w-xs text-xl" />
            @foreach($errors->get("apellidos") as $errors)
                <div class="text-sm text-red-600"
                {{$errors}}
            @endforeach
            <input type="text" name="email" placeholder="Email" class="input input-bordered input-info w-full max-w-xs text-xl" /><br>
            @foreach($errors->get("e-mail") as $errors)
                <div class="text-sm text-red-600"
                {{$errors}}
            @endforeach
            <select name="departamento" id="">
                <option disabled selected >Selecciona departamento</option>
                <option value="Informática">Informatica</option>
                <option value="comercio">comercio</option>
                <option value="imagen">imagen</option>
            </select>
            <input class="btn btn-outline btn-primary" type="submit" value="Crear">

        </form>

    </div>

</x-layouts.layout>
