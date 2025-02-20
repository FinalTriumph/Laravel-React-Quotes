<x-layout>
    <x-section-title title="Delete Profile" />
    <form action="{{ route('user.delete') }}" method="post" class="form-auth">
        @csrf
        @method('DELETE')
    
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
    
        <button
            class="btn-action w-full m-0 mt-2 bg-custom-danger"
        >
            Delete Profile
        </button>

        <a
            class="btn-action block text-center m-0 mt-2 mb-6"
            href="{{ route('user.profile') }}"
        >
            Profile
        </a>
    </form>
</x-layout>