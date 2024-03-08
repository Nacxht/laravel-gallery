<div class="bg-gray-200">
    <div class="pt-[4.8rem] lg:pt-[6rem] pb-3 px-3">
        <div class="container mx-auto grid grid-cols-12 gap-3">
            {{-- User Description --}}
            <div class="hidden lg:grid col-span-4 py-3 px-5 rounded-md h-80 bg-white gap-0">
                {{-- Title --}}
                <p class="font-bold col-span-12 h-fit">Intro</p>

                {{-- Bio --}}
                <div class="col-span-12 h-fit self-center">
                    <div class="text-center text-xs px-10 mb-5">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam aliquid debitis id quod enim
                        autem,
                        nesciunt atque itaque dignissimos. Eum!
                    </div>

                    @if (auth()->user()->username === $user->username)
                        {{-- Edit Bio (Owner) --}}
                        <button class="btn btn-primary w-full text-sm min-h-[2rem] h-0">Edit Bio</button>
                    @else
                        {{-- Divider (Other User) --}}
                        {{-- <div class="divider col-span-12 h-fit"></div> --}}
                    @endif
                </div>

                {{-- Links --}}
                <div></div>
            </div>

            {{-- Header / Profile Section --}}
            <div
                class="grid grid-cols-12 col-span-12 lg:col-span-4 bg-white py-10 px-5 rounded-md items-center gap-x-3 justify-items-center h-80">
                {{-- Avatar --}}
                <div class="col-span-full">
                    @if ($user->avatar)
                        <img class="max-w-40 rounded-full" src="{{ url('storage/img/avatar/' . $user->avatar) }}"
                            alt="">
                    @else
                        <img class="max-w-40 rounded-full" src="/default/user-default.png" alt="">
                    @endif
                </div>

                {{-- Full Name w/ Username --}}
                <div class="items-center col-span-full text-center">
                    <p class="font-bold text-3xl capitalize">{{ $user->username }}</p>
                    @if (Str::lower($user->full_name) === $user->username)
                        <p class="text-base capitalize text-gray-400">({{ $user->full_name }})</p>
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

            {{-- Edit User, Add Album, Upload Photo | Add Friend, Send DM --}}
            <div
                class="grid grid-cols-12 col-span-12 lg:col-span-4 py-10 px-5 rounded-md h-auto lg:h-80 bg-white items-center">
                @if (auth()->user()->username === $user->username)
                    {{-- Profile Owner / Admin --}}
                    <div class="col-span-12 grid grid-cols-12 gap-3">
                        {{-- Edit User --}}
                        <button onclick="main_modal.showModal()"
                            @click="$dispatch('main_modal', {
                        id: {{ auth()->id() }},
                        topDivider: true,
                        bottomDivider: false,
                        topClose: true,
                        bottomClose: true,
                        modalTitle: 'Edit User',
                        componentName: 'UserEdit',
                        modalTitleClass: 'font-bold text-center',
                    })"
                            class="col-span-12 text-center btn btn-outline border-gray-200 hover:bg-gray-200 hover:border-gray-200 hover:text-black">
                            Edit profile
                        </button>

                        {{-- Add Album --}}
                        <div onclick="main_modal.showModal()"
                            @click="$dispatch('main_modal', {
                            id: 'addAlbum',
                            topDivider: true,
                            bottomDivider: false,
                            topClose: true,
                            bottomClose: true,
                            modalTitle: 'Add Album',
                            componentName: 'AddAlbum',
                            modalTitleClass: 'font-bold text-center',
                        })"
                            class="col-span-6 text-center btn btn-outline border-gray-200 hover:bg-gray-200 hover:border-gray-200 hover:text-black">
                            Add an album
                        </div>

                        {{-- Upload Photo --}}
                        <div onclick="main_modal.showModal()"
                            @click="$dispatch('main_modal', {
                            id: 'addAlbum',
                            topDivider: true,
                            bottomDivider: false,
                            topClose: true,
                            bottomClose: true,
                            modalTitle: 'Upload Photo',
                            componentName: 'UploadPhoto',
                            modalTitleClass: 'font-bold text-center',
                        })"
                            class="col-span-6 text-center btn btn-outline border-gray-200 hover:bg-gray-200 hover:border-gray-200 hover:text-black">
                            Upload a photo
                        </div>
                    </div>
                @else
                    {{-- Other User --}}
                    <div class="col-span-12 grid grid-cols-12 gap-3">
                        {{-- Add Friend --}}
                        <div
                            class="col-span-6 text-center btn btn-outline border-gray-200 hover:bg-gray-200 hover:border-gray-200 hover:text-black">
                            Add as a friend
                        </div>

                        {{-- Send DM --}}
                        <div
                            class="col-span-6 text-center btn btn-outline border-gray-200 hover:bg-gray-200 hover:border-gray-200 hover:text-black">
                            Send Message
                        </div>
                    </div>
                @endif
            </div>

            {{-- Tabs Navigator --}}
            <div class="grid grid-cols-12 col-span-full lg:col-span-4 p-5 rounded-md h-auto max-h-80 bg-white">
                <div class="col-span-full font-bold">
                    {{-- Title --}}
                    <div class="mb-2">
                        <span>Posts</span>
                        <div class="divider my-0"></div>
                    </div>

                    {{-- Tabs Navigation --}}
                    <div role="tablist" class="tabs tabs-bordered mb-0 lg:mb-5 ">
                        <button @click="$dispatch('profile_tab', {tab: 'photo' })" role="tab"
                            @if ($tab === 'photo') class="tab tab-active text-sm"
                            @else
                            class="tab border-collapse text-sm" @endif>Photos</button>
                        <button @click="$dispatch('profile_tab', {tab: 'album' })" role="tab"
                            @if ($tab === 'album') class="tab tab-active text-sm"
                            @else
                            class="tab border-collapse text-sm" @endif>Albums</button>
                    </div>

                    {{-- Tabs Description --}}
                    <div class="text-center text-xs px-5 hidden lg:block text-gray-400 font-normal">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam saepe officia in beatae et
                        aperiam,
                        rerum quas corporis optio, a nobis libero dolorem. Corporis laborum repellat labore nesciunt hic
                        ipsum!
                    </div>
                </div>
            </div>

            {{-- Tabs Content (Posts, Albums, User Config, etc) --}}
            <div class="grid grid-cols-12 col-span-full lg:col-span-8 p-5 rounded-md h-[33rem] max-h-[33rem] bg-white">
                {{-- Content --}}
                <livewire:partials.profile.post-album :user='$user' />
            </div>
        </div>
    </div>

    {{-- Modal List --}}
    <livewire:components.modal />
</div>
