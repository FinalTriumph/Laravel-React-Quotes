<x-layout>
    <div
        id="home"
        data-sources="{{ json_encode(config('quotes.sources')) }}"
    ></div>
</x-layout>