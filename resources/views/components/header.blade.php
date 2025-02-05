<header class="bg-custom-primary-1 shadow">
    <nav class="flex max-w-screen-lg mx-auto">
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
    </nav>
</header>
