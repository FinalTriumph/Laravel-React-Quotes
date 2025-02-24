<x-layout>
    <div
        id="welcome"
        data-sources="{{ json_encode(config('quotes.sources')) }}"
    ></div>
</x-layout>