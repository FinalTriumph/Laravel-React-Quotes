<x-layout>
    <x-section-title title="Login" />
    <form action="{{ route('login') }}" method="post" class="form-auth">
        @csrf

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
            @error('failed')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="my-4">
            <input type="checkbox" name="remember">
            <label for="remember">Remember me</label>
        </div>

        <button class="btn-action w-full m-0 mt-2 mb-6">Login</button>
    </form>
</x-layout>