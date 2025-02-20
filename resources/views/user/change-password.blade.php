<x-layout>
    <x-section-title title="Change Password" />
    <form action="{{ route('user.password.update') }}" method="post" class="form-auth">
        @csrf
        @method('PATCH')
    
        <div class="my-4">
            <label for="old_password">Old Password:</label>
            <input
                type="password"
                name="old_password"
                class="input-text @error('old_password') input-text--error @enderror"
            >
            @error('old_password')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
    
        <div class="my-4">
            <label for="password">New Password:</label>
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
            <label for="password_confirmation">Confirm New Password:</label>
            <input
                type="password"
                name="password_confirmation"
                class="input-text @error('password') input-text--error @enderror"
            >
        </div>
    
        <button class="btn-action w-full m-0 mt-2">Save</button>

        <a
            class="btn-action block text-center m-0 mt-2 mb-6"
            href="{{ route('user.profile') }}"
        >
            Profile
        </a>
    </form>
</x-layout>