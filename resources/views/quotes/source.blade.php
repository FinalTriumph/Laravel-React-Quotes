<x-layout>
    <div
        id="source-quotes"
        data-page="{{ request()->input('page', 1) }}"
        data-source="{{ request()->route('source') }}"
    ></div>
</x-layout>