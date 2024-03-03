<div class="flex justify-center items-center h-[100dvh]">
    <div class="space-y-5">

        {{-- Branding --}}
        <div class="flex justify-center items-center gap-3">
            <img src="https://flowbite.com/docs/images/logo.svg" alt="Logo">
            <h1 class="text-3xl font-semibold">Gallery</h1>
        </div>

        {{-- Login Card --}}
        <div class="card w-96 lg:w-[35rem] bg-base-100 shadow-none lg:shadow-lg lg:border">
            <div class="grid p-10">
                {{-- Title --}}
                <h1 class="col-span-full text-xl lg:text-2xl font-bold leading-tight">
                    Sign in to your account
                </h1>

                <form wire:submit.prevent='login' class="mt-5 grid grid-cols-12 col-span-full space-y-4 md:space-y-6">
                    @csrf

                    {{-- Email --}}
                    <label class="form-control col-span-full">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Email</span>
                        </div>
                        <input type="text" placeholder="Type here" wire:model='email'
                            class="input input-bordered w-full focus:outline-none" />
                        <span class="text-sm text-red-500">{{ Session::get('emailNotFound') }}</span>
                        @error('email')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Password --}}
                    <label class="form-control col-span-full">
                        <div class="label">
                            <span class="label-text text-sm lg:text-base">Password</span>
                        </div>
                        <input type="password" placeholder="Type here" wire:model='password'
                            class="input input-bordered w-full focus:outline-none" />
                        <span class="text-sm text-red-500">{{ Session::get('password_fail') }}</span>
                        @error('password')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </label>

                    {{-- Sign in --}}
                    <button type="submit" class="btn btn-primary text-lg col-span-12">
                        Sign in
                    </button>

                    <div class="col-span-12">
                        {{-- Register --}}
                        <p class="text-gray-500 text-sm">Don't have an account yet? <a href="{{ route('register') }}"
                                wire:navigate class="text-blue-600 hover:underline">Sign
                                Up</a></p>

                        {{-- Homepage --}}
                        <p class="text-gray-500 text-sm">Back to <a href="/" wire:navigate
                                class="text-blue-600 hover:underline">Homepage</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
