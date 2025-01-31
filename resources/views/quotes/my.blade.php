<x-layout>
    <div
        id="my-quotes"
        data-page="{{ request()->input('page', 1) }}"
        data-name="{{ auth()->user()->name }}"
        data-email="{{ auth()->user()->email }}"
    ></div>
    
</x-layout>