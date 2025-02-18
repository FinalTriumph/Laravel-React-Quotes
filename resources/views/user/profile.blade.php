<x-layout>
    <div class="text-left">
        <div class="text-left">
            <div class="px-6 py-2 border-b">
                <div class="my-2">
                    <p class="text-white">Name:</p>
                    <p class="text-white font-bold">{{ auth()->user()->name }}</p>
                </div>
                <div class="my-2">
                    <p class="text-white">Email:</p>
                    <p class="text-white font-bold">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="pt-4 px-5">
                <div>
                    <a
                        class="btn-action inline-block my-2"
                        href="{{ route('user.edit') }}"
                    >
                        Edit profile
                    </a>
                </div>
                <div>
                    <a
                        class="btn-action inline-block my-2"
                        href="{{ route('user.password.change') }}"
                    >
                        Change password
                    </a>
                </div>
                <div>
                    <a
                        class="btn-action inline-block my-2 bg-custom-accent"
                        href="{{ route('user.profile.delete') }}"
                    >
                        Delete profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layout>