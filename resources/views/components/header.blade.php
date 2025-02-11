<header class="bg-custom-primary-1 shadow">
    <nav class="flex items-center max-w-screen-lg mx-auto">
        <a href="{{ route('home') }}" class="mr-auto">Laravel React Quotes</a>

        @foreach ($items as $item)
            @continue(!navItemAvailable($item))
        
            @if ($item['method'] === 'get')
                <a 
                    href="{{ route($item['route']) }}" 
                    class="{{ $active == $item['route'] ? 'text-custom-neutral-1 border-b-2 border-custom-neutral-1' : '' }}"
                >
                    {{ $item['title'] }}
                </a>
                @continue
            @endif
        
            <form action="{{ route($item['route']) }}" method="{{ $item['method'] }}">
                @csrf
                <button>{{ $item['title'] }}</button>
            </form>
        @endforeach

        {{-- TODO This is still experimental --}}
        @auth
            <!-- User Avatar and Dropdown Menu -->
            <div class="relative" x-data="{ open: false }">
                <button
                    @click="open = !open"
                    class="p-0 mt-1 mx-4 focus:outline-none rounded-full h-8 w-8 overflow-hidden hover:opacity-90"
                >
                    <img
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&size=128&background=d5e3e6&color=5b6d92&bold=true"
                        alt="User Avatar"
                    />
                </button>

                <!-- Dropdown Menu -->
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-2 mt-2 min-w-48 bg-custom-primary-1 border border-custom-neutral-2 rounded-md shadow-lg z-10"
                >
                    <div class="p-4 border-b border-custom-neutral-1">
                        <p class="text-custom-neutral-1">{{ Auth::user()->name }}</p>
                        <p class="text-custom-neutral-1">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="py-2">
                        <a
                            href="{{ route('home') }}"
                            class="btn-nav-dropdown"
                        >
                            Profile
                        </a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button
                                type="submit"
                                class="btn-nav-dropdown w-full text-left"
                            >
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </nav>
</header>
