<x-layout>
    <div
        id="my-quotes"
        data-name="{{ auth()->user()->name }}"
        data-email="{{ auth()->user()->email }}"
    ></div>
    
</x-layout>