<x-layout>
    <div
        id="home"
        data-name="{{ auth()->user()->name }}"
        data-email="{{ auth()->user()->email }}"
    ></div>
</x-layout>