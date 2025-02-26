<x-layout>
    <div
        id="user-quotes"
        data-page="{{ request()->input('page', 1) }}"
        data-sources="{{ json_encode(config('quotes.sources')) }}"
        data-user="{{ $user->id }}"
        data-name="{{ $user->name }}"
    ></div>
</x-layout>
