<x-layout>
    <div
        id="source-quotes"
        data-page="{{ request()->input('page', 1) }}"
        data-sources="{{ json_encode(config('quotes.sources')) }}"
        data-source="{{ request()->route('source') }}"
    ></div>
</x-layout>