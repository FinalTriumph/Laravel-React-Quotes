@props(['user'])

<x-layout>
    <form action="{{ route('user.update', $user) }}" method="post" class="form-auth">
        @csrf
        @method('PATCH')

        <div class="my-4">
            <label for="name">Name:</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') ?? $user->name }}"
                class="input-text @error('name') ring-red-500 focus:ring-red-500 @enderror"
            >
            @error('name')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="email">Email:</label>
            <input
                type="text"
                name="email"
                value="{{ old('email') ?? $user->email }}"
                class="input-text @error('email') ring-red-500 focus:ring-red-500 @enderror"
            >
            @error('email')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn-action w-full m-0 mt-2 mb-6">Save</button>
    </form>
</x-layout>