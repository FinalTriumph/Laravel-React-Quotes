<x-layout>
    <div
        id="my-quotes"
        data-page="{{ request()->input('page', 1) }}"
        data-sources="{{ json_encode(config('quotes.sources')) }}"
    ></div>
    
</x-layout>