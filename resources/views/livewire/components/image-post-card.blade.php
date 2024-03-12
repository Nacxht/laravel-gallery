<div wire:refresh_comment="$wire.$refresh()">
    <div class="max-w-xs md:max-w-sm bg-white border border-gray-200 rounded-lg shadow">
        {{-- Creator, Title & Description --}}
        <div>
            <div class="p-5">
                {{-- User --}}
                <div class="flex items-center gap-4">
                    {{-- Avatar --}}
                    <a href="{{ route('profile', ['username' => $photo['authorData']->username]) }}">
                        @if ($photo['authorData']->avatar)
                            <img class="w-10 h-10 rounded-full"
                                src="{{ url('storage/img/avatar/' . $photo['authorData']->avatar) }}" alt="">
                        @else
                            <img class="w-10 h-10 rounded-full" src="/default/user-default.png" alt="">
                        @endif
                    </a>

                    {{-- Username --}}
                    <div class="font-medium">
                        <a class="hover:underline"
                            href="{{ route('profile', ['username' => $photo['authorData']->username]) }}">
                            <div>{{ $photo['authorData']->username }}</div>
                        </a>
                        <div class="text-sm text-gray-500 dark:text-gray-400 select-none">
                            {{ date('d F Y - H:i', strtotime($photo['data']->created_at)) }}
                        </div>
                    </div>
                </div>
                {{-- *** --}}

                {{-- Title & Description --}}
                <div>
                    {{-- Title --}}
                    <h5 class="mt-5 mb-1 text-base font-bold tracking-tight text-gray-900 capitalize">
                        {{ str_replace('-', ' ', $photo['data']->title) }}
                    </h5>

                    {{-- Description --}}
                    <p class="font-normal text-sm text-gray-700 dark:text-gray-400">
                        {{ $photo['data']->description }}
                    </p>
                </div>
                {{-- *** --}}
            </div>
        </div>
        {{-- End --}}

        {{-- Image --}}
        <div class="">
            <div class="flex items-center justify-center w-full sm:w-96">
                <button
                    @click="$dispatch('overview_modal', {
                            id: {{ $photo['data']->id }}
                        })"
                    onclick="overview_modal.showModal()" class="hover:opacity-75 transition-opacity duration-200">
                    <img class="w-full" src="{{ url('storage/img/photos/' . $photo['data']->filename, []) }}"
                        alt="">
                </button>
            </div>
        </div>
        {{-- End --}}

        {{-- Footer --}}
        <div class="p-3">
            {{-- Upper Section --}}
            <div class="flex gap-1 justify-between">
                {{-- Like Count --}}
                <div class="flex items-center">
                    {{-- Like --}}
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <path fill="#43a9f7"
                                d="M7.24 11v9H5.63c-.9 0-1.62-.72-1.62-1.61v-5.77c0-.89.73-1.62 1.62-1.62zM18.5 9.5h-4.78V6c0-1.1-.9-2-1.99-2h-.09c-.4 0-.76.24-.92.61L7.99 11v9h9.2c.73 0 1.35-.52 1.48-1.24l1.32-7.5c.16-.92-.54-1.76-1.48-1.76Z" />
                        </svg>
                    </div>
                    {{-- *** --}}

                    {{-- Count --}}
                    <div>
                        <p class="font-normal text-gray-700 dark:text-gray-400">
                            {{ $likesCount }}
                        </p>
                    </div>
                    {{-- *** --}}
                </div>
                {{-- *** --}}

                {{-- Comment Count --}}
                <div @click="$dispatch('main_modal', {
                            id: {{ $photo['data']->id }},
                            topDivider: true,
                            bottomDivider: false,
                            topClose: true,
                            bottomClose: false,
                            modalTitle: 'Comments',
                            componentName: 'PhotoCommentModal',
                            modalTitleClass: 'font-bold text-center',
                        }); $dispatch('photo_comment', {id: {{ $photo['data']->id }}})"
                    onclick="main_modal.showModal()"
                    class="flex gap-1 items-center float-end font-normal text-gray-700 dark:text-gray-400 hover:underline select-none cursor-pointer">
                    {{ $commentsCount }} Comments
                </div>
                {{-- *** --}}
            </div>
            {{-- *** --}}

            {{-- Divider --}}
            <div class="border my-2"></div>
            {{-- *** --}}

            {{-- Bottom Section --}}
            <div class="flex items-center justify-around gap-2">

                {{-- Like --}}
                <div class="w-full h-12">
                    <button wire:click='photoLike'
                        class="flex items-center gap-1 w-full justify-center h-full hover:bg-gray-200 rounded-md btn border-none bg-transparent">
                        @if (!$isLiked)
                            {{-- No Liked --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="#888888"
                                    d="M20.22 9.55c-.43-.51-1.05-.8-1.72-.8h-4.03V6c0-1.52-1.23-2.75-2.83-2.75c-.7 0-1.33.42-1.61 1.07l-2.54 5.93H5.62c-1.31 0-2.37 1.06-2.37 2.37v5.77c0 1.3 1.07 2.36 2.37 2.36h11.56c1.09 0 2.02-.78 2.21-1.86l1.32-7.5c.11-.66-.07-1.33-.5-1.84Zm-14.6 9.7c-.48 0-.87-.39-.87-.86v-5.77c0-.48.39-.87.87-.87h1.61v7.5zm12.3-.62c-.06.36-.37.62-.74.62H8.74v-8.1l2.67-6.25c.04-.09.13-.16.32-.16c.69 0 1.24.56 1.24 1.25v4.25h5.53c.23 0 .43.09.57.26c.14.17.2.39.16.62l-1.32 7.5Z" />
                            </svg>
                        @else
                            {{-- Liked --}}
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="#43A9F7"
                                        d="M7.24 11v9H5.63c-.9 0-1.62-.72-1.62-1.61v-5.77c0-.89.73-1.62 1.62-1.62zM18.5 9.5h-4.78V6c0-1.1-.9-2-1.99-2h-.09c-.4 0-.76.24-.92.61L7.99 11v9h9.2c.73 0 1.35-.52 1.48-1.24l1.32-7.5c.16-.92-.54-1.76-1.48-1.76Z" />
                                </svg>
                            </div>
                        @endif

                        {{-- Text --}}
                        <div>
                            <p class="font-semibold text-base text-gray-700 dark:text-gray-400">
                                Like
                            </p>
                        </div>
                    </button>
                </div>
                {{-- *** --}}

                {{-- Comment --}}
                <div class="w-full h-12">
                    <button
                        @click="$dispatch('main_modal', {
                            id: {{ $photo['data']->id }},
                            topDivider: true,
                            bottomDivider: false,
                            topClose: true,
                            bottomClose: false,
                            modalTitle: 'Comments',
                            componentName: 'PhotoCommentModal',
                            modalTitleClass: 'font-bold text-center',
                        }); $dispatch('photo_comment', {id: {{ $photo['data']->id }}})"
                        onclick="main_modal.showModal()"
                        class="flex items-center gap-1 w-full justify-center h-full hover:bg-gray-200 rounded-md btn border-none bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 24 24">
                            <path fill="#888888"
                                d="M12 2A10 10 0 0 0 2 12a9.89 9.89 0 0 0 2.26 6.33l-2 2a1 1 0 0 0-.21 1.09A1 1 0 0 0 3 22h9a10 10 0 0 0 0-20m0 18H5.41l.93-.93a1 1 0 0 0 0-1.41A8 8 0 1 1 12 20" />
                        </svg>

                        {{-- Text --}}
                        <div>
                            <p class="font-semibold text-base text-gray-700 dark:text-gray-400">
                                Comment
                            </p>
                        </div>
                    </button>
                </div>
                {{-- *** --}}

            </div>
            {{-- *** --}}
        </div>
        {{-- End --}}
    </div>
</div>
