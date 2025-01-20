<header class="bg-slate-700 text-slate-100">
    <nav class="flex max-w-screen-lg mx-auto">
        <a href="{{ route('home') }}" class="mr-auto">Laravel React Quotes</a>
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endguest
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button>Logout</button>
            </form>
        @endauth
    </nav>
</header>
