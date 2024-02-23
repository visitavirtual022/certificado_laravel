<x-layouts.layout>

    <div class="h-full flex justify-center items-center">

        <form action="/profesores/{{$profesor->id}}" method="post" class="w-1/3 bg-white p-5 border-blue-500 space-y-10 border-2 rounded-3xl justify-center items-center">
            @csrf
            @method("PUT")

            <input type="text" value ="{{$profesor->nombre}}" name="nombre" placeholder="Nombre" class="input input-bordered input-info w-full max-w-xs text-xl" />
            <input type="text" value ="{{$profesor->apellido}}" name="apellido" placeholder="Apellidos" class="input input-bordered input-info w-full max-w-xs text-xl" />
            <input type="text" value ="{{$profesor->direccion}}" name="direccion" placeholder="Dirección" class="input input-bordered input-info w-full max-w-xs text-xl" />
            <input type="text" value ="{{$profesor->telefono}}" name="telefono" placeholder="Teléfono" class="input input-bordered input-info w-full max-w-xs text-xl" />
            <input type="text" value ="{{$profesor->email}}" name="email" placeholder="Email" class="input input-bordered input-info w-full max-w-xs text-xl" /><br>
            <input class="btn btn-outline btn-primary" type="submit" value="Actualizar">

        </form>

    </div>

</x-layouts.layout>
