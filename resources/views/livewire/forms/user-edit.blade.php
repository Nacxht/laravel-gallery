<div class="mb-5">
    <form wire:submit.prevent='userEdit' class="mt-5 grid grid-cols-12 col-span-12 space-y-4 md:space-y-6 gap-2">
        @csrf

        {{-- Avatar --}}
        <label for="dropzone-file"
            class="col-span-5 lg:col-span-3 flex items-center justify-center w-24 h-24 border-2 border-gray-300 border-dashed rounded-full cursor-pointer bg-gray-50 hover:bg-gray-100">
            <div class="flex items-center justify-center p-[0.2rem]">
                {{-- SVG Default --}}
                @if (!$user->avatar && !$avatarNew)
                    <div class="h-full">
                        <img class="w-full h-full rounded-full aspect-square" src="/default/user-default.png"
                            alt="user-avatar">
                    </div>
                @endif
                {{-- *** --}}

                {{-- Image --}}
                @if ($user->avatar || $avatarNew)
                    <div class="h-full">
                        <img class="w-full h-full rounded-full aspect-square"
                            src="{{ empty(!$avatarNew) ? $avatarNew->temporaryUrl() : '/storage/img/avatar/' . Auth::user()->avatar }}"
                            alt="user-avatar">
                    </div>
                @endif
                {{-- *** --}}
            </div>
            <input id="dropzone-file" type="file" accept="image/png, image/jpeg, image/jpg" wire:model='avatarNew'
                class="hidden rounded-circle" />
            @error('avatar')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </label>

        {{-- Username --}}
        <label class="form-control col-span-7 lg:col-span-9 w-full">
            <div class="label">
                <span class="label-text text-sm lg:text-base">Username</span>
            </div>
            <input type="text" placeholder="Username" maxlength="10" wire:model='username'
                class="input input-bordered w-full focus:outline-none text-xs lg:text-sm" />
            @error('username')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </label>

        {{-- Email --}}
        <label class="form-control col-span-6 w-full">
            <div class="label">
                <span class="label-text text-sm lg:text-base">Email</span>
            </div>
            <input type="text" placeholder="Email" wire:model='email'
                class="input input-bordered w-full focus:outline-none text-xs lg:text-sm" />
            @error('email')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </label>

        {{-- Full Name --}}
        <label class="form-control col-span-6 w-full">
            <div class="label">
                <span class="label-text text-sm lg:text-base">Full Name</span>
            </div>
            <input type="text" placeholder="Full name" wire:model='fullName'
                class="input input-bordered w-full focus:outline-none text-xs lg:text-sm" />
            @error('fullName')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </label>

        <div class="col-span-12 grid grid-cols-12 gap-2">
            {{-- Change Password Warn --}}
            <div class="col-span-12 text-xs text-red-500">
                Don't change your password if it's not necessary!
            </div>

            {{-- Password --}}
            <label class="form-control col-span-6 w-full">
                <div class="label">
                    <span class="label-text text-sm lg:text-base">Password</span>
                </div>
                <input type="password" placeholder="Password" wire:model='password'
                    class="input input-bordered w-full focus:outline-none text-xs lg:text-sm" />
                @error('password')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </label>

            {{-- Confirm Password --}}
            <label class="form-control col-span-6 w-full">
                <div class="label">
                    <span class="label-text text-sm lg:text-base">Confirm Password</span>
                </div>
                <input type="password" placeholder="Confirm password" wire:model='confirmPassword'
                    class="input input-bordered w-full focus:outline-none text-xs lg:text-sm" />
                @error('confirmPassword')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </label>
        </div>

        {{-- Address --}}
        <label class="form-control col-span-12">
            <div class="label">
                <span class="label-text text-sm lg:text-base">Address</span>
            </div>
            <textarea class="textarea textarea-bordered h-24 text-xs lg:text-sm" placeholder="Address" wire:model='address'></textarea>
            @error('address')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </label>

        {{-- Sign in --}}
        <button type="submit" class="btn btn-primary col-span-12">
            Edit Profile Details
        </button>
    </form>
</div>
