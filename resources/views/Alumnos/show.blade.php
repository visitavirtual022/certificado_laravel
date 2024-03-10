<x-layouts.layout>
    <div class="flex flex-col justify-between items-center p-2 h-30">
        <div class="flex flex-col justify-top items-center w-full max-w-screen-md">
            <div class="bg-white rounded-lg shadow-lg w-full">
                <div class="p-2 md:p-2"> <!-- Reducido el padding en dispositivos más pequeños -->
                    <h2 class="text-2xl font-bold text-center mb-4 md:mb-6">Datos del alumno</h2>
                    <div class="grid grid-cols-1 gap-4 md:gap-6">
                        {{-- Primera columna --}}
                        <div>
                            <fieldset class="border border-gray-300 p-2 md:p-3 rounded"> <!-- Reducido el padding en dispositivos más pequeños -->
                                <legend class="text-md font-semibold mb-2 md:mb-3">Información personal</legend> <!-- Reducido el espacio entre el título y el contenido en dispositivos más pequeños -->
                                <div>
                                    <label class="block mb-1">Nombre y Apellidos</label>
                                    <p>{{$alumno->nombre}} {{$alumno->apellido}}</p>
                                </div>
                                <div class="mt-2 md:mt-4">
                                    <label class="block mb-1">Dirección</label>
                                    <p>{{$alumno->direccion}}</p>
                                </div>
                                <div class="mt-2 md:mt-4"> <!-- Reducido el espacio entre elementos en dispositivos más pequeños -->
                                    <label class="block mb-1">Teléfono</label>
                                    <p>{{$alumno->telefono}}</p>
                                </div>
                                <div class="mt-2 md:mt-4"> <!-- Reducido el espacio entre elementos en dispositivos más pequeños -->
                                    <label class="block mb-1">Email</label>
                                    <p>{{$alumno->email}}</p>
                                </div>
                            </fieldset>
                        </div>
                        {{-- Fin de la primera columna --}}

                        {{-- Segunda columna --}}
                        <div>
                            <fieldset class="border border-gray-300 p-3 md:p-4 rounded">
                                <legend class="text-lg font-semibold mb-2 md:mb-3">Idiomas que habla {{$alumno->nombre}}</legend>
                                <p>
                                    @foreach($alumno->idiomas as $key => $idioma)
                                        {{$idioma->idioma}}{{ $key != $loop->count - 1 ? ',' : '' }}
                                    @endforeach
                                </p>
                            </fieldset>
                        </div>

                        {{-- Fin de la segunda columna --}}
                    </div>
                    {{-- Fin de la grid --}}

                    <div class="mt-4 md:mt-6 flex justify-center ">
                        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-950" onclick="goBack()">Volver</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Aquí iría el footer --}}
    </div>
    <script> <!-- Agrego una función Javascript para volver al listado.blade -->
        function goBack() {
            window.history.back();
        }
    </script>
</x-layouts.layout>

