<x-layout>
    <div
        id="all-quotes"
        data-page="{{ request()->input('page', 1) }}"
        data-sources="{{ json_encode(config('quotes.sources')) }}"
    ></div>
</x-layout>