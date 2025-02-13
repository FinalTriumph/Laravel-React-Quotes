<x-layout>
    <div class="text-left">
        <div class="bg-custom-neutral-1 shadow py-4 px-6 mb-4">
            <h1 class="font-bold">Profile</h1>
        </div>
        <div class="text-left">
            <div class="px-6 py-2 border-b">
                <div class="my-2">
                    <p>Name:</p>
                    <p class="font-bold">{{ auth()->user()->name }}</p>
                </div>
                <div class="my-2">
                    <p>Email:</p>
                    <p class="font-bold">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="pt-4 px-5">
                <div>
                    <a
                        class="btn-action inline-block my-2"
                        href="{{ route('user.edit', auth()->user()) }}"
                    >
                        Edit profile
                    </a>
                </div>
                <div>
                    {{-- TODO --}}
                    <a
                        class="btn-action inline-block my-2"
                        href="{{ route('user.profile') }}"
                    >
                        Change password
                    </a>
                </div>
                <div>
                    {{-- TODO --}}
                    <a
                        class="btn-action inline-block my-2 bg-custom-accent"
                        href="{{ route('user.profile') }}"
                    >
                        Delete profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>