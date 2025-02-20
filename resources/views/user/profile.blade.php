<x-layout>
    <x-section-title title="Profile" />
    <div class="text-left p-8 m-2 bg-white border border-custom-neutral-2 shadow rounded-lg">
        <div class="pb-4 mb-4 border-b">
            <div class="mb-2">
                <p>Name:</p>
                <p class="font-bold">{{ auth()->user()->name }}</p>
            </div>
            <div class="mb-2">
                <p>Email:</p>
                <p class="font-bold">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <div class="mt-6">
            <a
                class="btn-action inline-block"
                href="{{ route('user.edit') }}"
            >
                Edit profile
            </a>
            <a
                class="btn-action inline-block"
                href="{{ route('user.password.change') }}"
            >
                Change password
            </a>
            <a
                class="btn-action inline-block bg-custom-danger"
                href="{{ route('user.profile.delete') }}"
            >
                Delete profile
            </a>
        </div>
    </div>
</x-layout>