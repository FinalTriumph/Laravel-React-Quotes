<x-layout>
    <x-section-title title="Register" />
    <form action="{{ route('register') }}" method="post" class="form-auth">
        @csrf

        <div class="my-4">
            <label for="name">Name:</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="input-text @error('name') input-text--error @enderror"
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
                value="{{ old('email') }}"
                class="input-text @error('email') input-text--error @enderror"
            >
            @error('email')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <label for="password">Password:</label>
            <input
                type="password"
                name="password"
                class="input-text @error('password') input-text--error @enderror"
            >
            @error('password')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="my-4">
            <label for="password_confirmation">Confirm Password:</label>
            <input
                type="password"
                name="password_confirmation"
                class="input-text @error('password') input-text--error @enderror"
            >
        </div>

        <button class="btn-action w-full m-0 mt-2 mb-6">Register</button>
    </form>
</x-layout>