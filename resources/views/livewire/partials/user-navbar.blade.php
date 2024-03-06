<nav class="grid grid-cols-3 bg-white p-4 border-b fixed w-full top-0 start-0 z-20 items-center">
    {{-- Branding & Search --}}
    <div class="hidden lg:flex gap-3 col-span-1 items-center justify-self-start">
        <a href="/" wire:navigate>
            <img src="https://flowbite.com/docs/images/logo.svg" alt="Logo" class="h-8">
        </a>
        <label class="flex items-center gap-2 border rounded-lg pr-2">
            <input type="text" class="focus:outline-none input focus:border-none" placeholder="Search" />
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70">
                <path fill-rule="evenodd"
                    d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                    clip-rule="evenodd" />
            </svg>
        </label>
    </div>

    {{-- Icon Navigation --}}
    <div class="flex col-span-3 lg:col-span-1 justify-self-center gap-14 lg:gap-20">
        {{-- Home --}}
        <a href="/" wire:navigate class="">
            <img src="/svg/home.svg" alt="">
        </a>

        {{-- Album --}}
        <a href="{{ '/profile/' . auth()->user()->username . '/?tabContent=album' }}" wire:navigate
            class=" hidden lg:block">
            <img src="/svg/albums.svg" alt="">
        </a>

        {{-- Photo --}}
        <a href="{{ '/profile/' . auth()->user()->username . '/?tabContent=photo' }}" wire:navigate
            class=" hidden lg:block">
            <img src="/svg/photos.svg" alt="">
        </a>

        {{-- User --}}
        <a href="" wire:navigate class="c block lg:hidden">
            <img src="/svg/profile.svg" alt="">
        </a>

        {{-- Notification --}}
        <a href="" wire:navigate class="">
            <img src="/svg/notification.svg" alt="">
        </a>

        {{-- Other --}}
        <a href="" wire:navigate class="c block lg:hidden">
            <img src="/svg/hamburger.svg" alt="">
        </a>
    </div>

    {{-- Avatar Dropdown --}}
    <div class="justify-self-end hidden lg:block">
        <livewire:components.avatar-dropdown />
    </div>
</nav>
