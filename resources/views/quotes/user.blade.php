<x-layout>
    <div
        id="user-quotes"
        data-page="{{ request()->input('page', 1) }}"
        data-user="{{ request()->route('user') }}"
    ></div>
</x-layout>
