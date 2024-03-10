<x-layouts.layout>
    <div class="overflow-x-auto max-h-full">
        @if(session('status'))
            <script>
                Swal.fire("{{session("status")}}");
            </script>
            {{--            <div id="alertSession" role="alert" class="alert alert-success">--}}
            {{--                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>--}}
            {{--                <span>{{session('status')}}</span>--}}
            {{--            </div>--}}
        @endif
        <a href="/profesores/create" class="btn btn-primary w-full text-3xl"> Añadir Profesor</a>
        <table class="table table-xs table-pin-rows ">

            <tr>
                <th>nombre</th>
                <th>apellidos</th>
                <th>dni</th>
                <th>email</th>
                <th>departamento</th>
            </tr>

            @foreach($profesores as $profesor)
                <tr>
                    <td>{{$profesor->nombre}}</td>
                    <td>{{$profesor->apellidos}}</td>
                    <td>{{$profesor->dni}}</td>
                    <td>{{$profesor->email}}</td>
                    <td>{{$profesor->departamento}}</td>
                    <td>
                        <form action="/profesores/{{$profesor->id}}" method="POST">
                            @csrf
                            @method("DELETE")

                            <button onClick="confirmDelete(event, this) " class=type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route("profesores.edit", $profesor->id)}}" class="bth">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </a>
                    </td>

                </tr>
            @endforeach

        </table>
    </div>
    <script>
        function confirmDelete(event, button) {
            event.preventDefault();
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borrarlo!'
            }).then((result) => {
                    console.log("Resultado "+result);
                    if (result.isConfirmed)
                        button.closest('form').submit();
                }

            )

        }

        // window.onload=funcion()
        // {
        //     setTimeout(function()  {
        //         document.getElementById("alertSession").style.display = "none"},5000);
        // }
        // window.onload=()=>
        //     setTimeout(()=>
        //         document.getElementById("alertSession").style.display = "none",5000);
    </script>

    {{ $profesores ->links("vendor.pagination.simple-tailwind") }}

</x-layouts.layout>
