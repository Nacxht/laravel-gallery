<x-app-layout>
    @section('title', 'Gallery')

    <div class="pt-[6rem] h-screen">
        <div class="container mx-auto grid grid-cols-12 gap-3">
            {{-- User Description --}}
            <div class="grid grid-cols-12 col-span-4 py-10 px-5 rounded-md h-80 bg-white">
                <div></div>
            </div>

            {{-- Header / Profile Section --}}
            <div
                class="grid grid-cols-12 col-span-4 bg-white py-10 px-5 rounded-md items-center gap-x-3 justify-items-center h-80">
                {{-- Avatar --}}
                <div class="col-span-full">
                    @if ($user->avatar)
                        <img class="max-w-40" src="" alt="">
                    @else
                        <img class="max-w-40" src="/default/user-default.png" alt="">
                    @endif
                </div>

                {{-- Full Name w/ Username --}}
                <div class="items-center col-span-full text-center">
                    <p class="font-bold text-3xl">{{ $user->username }}</p>
                    @if ($user->full_name === $user->username)
                        <p class="text-base">({{ $user->full_name }})</p>
                    @endif
                </div>

                {{-- Profile Owner --}}
                <div class="col-span-10">
                    {{-- Edit Profile --}}
                    <div></div>
                </div>

                {{-- Visitor --}}
                <div class="hidden"></div>
            </div>

            {{-- Add Album & Upload Photo --}}
            <div class="grid grid-cols-12 col-span-4 py-10 px-5 rounded-md h-80 bg-white">
                {{-- Add Album --}}
                <div></div>

                {{-- Upload Photo --}}
                <div></div>
            </div>
        </div>
    </div>
</x-app-layout>
