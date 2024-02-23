<header class="h-15v bg-header flex flex-row
 justify-between p-5 items-center">
    <img class="h-2/3" src="{{asset("images/logo.png")}}" alt="logo">
    <h1 class="text-white uppercase text-6xl">Gestión Laravel</h1>
    @guest
    <div class="space-x-4">
        <a href="login" class = "text-white btn glass">Login</a>
        <a href="register" class = "btn glass text-white">Register</a>
    </div>
    @endguest
    @auth
    <div class="space-x-4">
        <h4 class="text-white uppercase text-6xl">{{auth()->user()->name}}</h4>
        <form action="logout" method="POST">
            @csrf
    <button class="btn glass text-white" type="submit">Button</button>
        </form>
    </div>
    @endauth

</header>
