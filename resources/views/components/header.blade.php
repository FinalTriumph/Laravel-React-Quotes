<header class="bg-custom-primary-1 shadow">
    <nav class="flex max-w-screen-lg mx-auto">
        <a href="{{ route('home') }}" class="mr-auto">Laravel React Quotes</a>

        @foreach ($items as $item)
            @continue(!navItemAvailable($item))

            @if (!($item['dropdown'] ?? null))
                @if ($item['method'] === 'get')
                    <a 
                        href="{{ route($item['route']) }}" 
                        class="{{ $active == $item['route'] ? 'text-custom-neutral-1 border-b-custom-neutral-1' : '' }}"
                    >
                        {{ $item['title'] }}
                    </a>
                    @continue
                @endif
            
                <form action="{{ route($item['route']) }}" method="{{ $item['method'] }}">
                    @csrf
                    <button>{{ $item['title'] }}</button>
                </form>
                @continue
            @endif

            <div class="relative" x-data="{ open: false }">
                @if (($item['customTitle'] ?? null) === 'userAvatar')
                    <button
                        @click="open = !open"
                        class="py-3"
                    >
                        <img
                            src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&size=128&background=d5e3e6&color=5b6d92&bold=true"
                            alt="User Avatar"
                            class="h-8 w-8 rounded-full"
                        />
                    </button>
                @else
                    <button @click="open = !open">
                        {{ $item['title'] }}
                    </button>
                @endif

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute right-0 min-w-48 bg-custom-primary-1 border shadow-lg z-10"
                >
                    @if (($item['customHeader'] ?? null) === 'userInfo')
                        <div class="p-4 border-b border-custom-neutral-1">
                            <p class="text-custom-neutral-1">{{ Auth::user()->name }}</p>
                            <p class="text-custom-neutral-1">{{ Auth::user()->email }}</p>
                        </div>
                    @endif

                    <div class="py-2">
                        @foreach ($item['dropdown'] as $dropdownItem)
                            @continue(!navItemAvailable($dropdownItem))

                            @if ($dropdownItem['method'] === 'get')
                                <a
                                    href="{{ route($dropdownItem['route']) }}"
                                    class="btn-nav-dropdown {{ $active == $dropdownItem['route'] ? 'text-custom-neutral-1' : '' }}"
                                >
                                    {{ $dropdownItem['title'] }}
                                </a>
                                @continue
                            @endif
                        
                            <form action="{{ route($dropdownItem['route']) }}" method="{{ $dropdownItem['method'] }}">
                                @csrf
                                <button
                                    class="btn-nav-dropdown w-full text-left"
                                >
                                    {{ $dropdownItem['title'] }}
                                </button>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </nav>
</header>
