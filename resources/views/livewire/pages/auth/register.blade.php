<div class="h-[100dvh]">
    <div class="space-y-5 p-10 grid grid-cols-12 justify-items-center">

        {{-- Branding --}}
        <div class="flex justify-center items-center gap-3 col-span-12">
            <img src="https://flowbite.com/docs/images/logo.svg" alt="Logo">
            <h1 class="text-3xl font-semibold">Gallery</h1>
        </div>

        {{-- Login Card --}}
        <div class="card w-96 lg:w-[35rem] bg-base-100 shadow-none lg:shadow-lg lg:border col-span-12">
            <div class="grid p-10">

                {{-- Title --}}
                <h1 class="col-span-12 text-xl lg:text-2xl font-bold leading-tight">
                    Create an account
                </h1>

                <form wire:submit.prevent='userRegister'
                    class="mt-5 grid grid-cols-12 col-span-12 space-y-4 md:space-y-6 gap-2">
                    @csrf

                    {{-- Avatar --}}
                    <label for="dropzone-file"
                        class="col-span-5 lg:col-span-3 flex items-center justify-center w-24 h-24 border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex items-center justify-center p-[0.2rem]">
                            {{-- SVG Default --}}
                            @if (!$avatar)
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="#888888"
                                        d="M9.775 12q-.9 0-1.5-.675T7.8 9.75l.325-2.45q.2-1.425 1.3-2.363T12 4q1.475 0 2.575.938t1.3 2.362l.325 2.45q.125.9-.475 1.575t-1.5.675zm0-2h4.45L13.9 7.6q-.1-.7-.637-1.15T12 6q-.725 0-1.263.45T10.1 7.6zM4 20v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20zm2-2h12v-.8q0-.275-.137-.5t-.363-.35q-1.35-.675-2.725-1.012T12 15q-1.4 0-2.775.338T6.5 16.35q-.225.125-.363.35T6 17.2zm6 0" />
                                </svg>
                            @endif
                            {{-- *** --}}

                            {{-- Image --}}
                            @if ($avatar)
                                <div class="h-full">
                                    <img class="w-full h-full rounded-full aspect-square"
                                        src="{{ $avatar->temporaryUrl() }}" alt="user-avatar">
                                </div>
                            @endif
                            {{-- *** --}}
                        </div>
                        <input id="dropzone-file" type="file" accept="image/png, image/jpeg, image/jpg"
                            wire:model='avatar' class="hidden rounded-circle" />
                        @error('avatar')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Username --}}
                    <label class="form-control col-span-7 lg:col-span-9 w-full">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Username</span>
                        </div>
                        <input type="text" placeholder="Type here" maxlength="10" wire:model='username'
                            class="input input-bordered w-full focus:outline-none" />
                        @error('username')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Email --}}
                    <label class="form-control col-span-6 w-full">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Email</span>
                        </div>
                        <input type="text" placeholder="Type here" wire:model='email'
                            class="input input-bordered w-full focus:outline-none" />
                        @error('email')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Full Name --}}
                    <label class="form-control col-span-6 w-full">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Nama Lengkap</span>
                        </div>
                        <input type="text" placeholder="Type here" wire:model='fullName'
                            class="input input-bordered w-full focus:outline-none" />
                        @error('fullName')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Password --}}
                    <label class="form-control col-span-6 w-full">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Password</span>
                        </div>
                        <input type="password" placeholder="Type here" wire:model='password'
                            class="input input-bordered w-full focus:outline-none" />
                        @error('password')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Password --}}
                    <label class="form-control col-span-6 w-full">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Confirm Password</span>
                        </div>
                        <input type="password" placeholder="Type here" wire:model='confirmPassword'
                            class="input input-bordered w-full focus:outline-none" />
                        @error('confirmPassword')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Address --}}
                    <label class="form-control col-span-12">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Address</span>
                        </div>
                        <textarea class="textarea textarea-bordered h-24" placeholder="Bio" wire:model='address'></textarea>
                        @error('address')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Sign in --}}
                    <button type="submit" class="btn btn-primary text-lg col-span-12">
                        Create an account
                    </button>

                    <div class="col-span-full">
                        {{-- Register --}}
                        <p class="text-gray-500 text-sm">Already have an account? <a href="{{ route('login') }}"
                                wire:navigate class="text-blue-600 hover:underline">Sign In</a></p>

                        {{-- Homepage --}}
                        <p class="text-gray-500 text-sm">Back to <a href="/" wire:navigate
                                class="text-blue-600 hover:underline">Homepage</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
