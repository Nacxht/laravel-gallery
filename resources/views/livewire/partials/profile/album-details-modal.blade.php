<div class="w-full pt-3">
    <div class="grid grid-cols-12">

        {{-- Details --}}
        <div class="col-span-12 mb-5">
            {{-- Title --}}
            <div>
                <p class="font-semibold capitalize text-lg">{{ str_replace('-', ' ', $album->album_name) }}</p>
                <p class="text-sm text-gray-500">{{ $album->description }}</p>
            </div>
        </div>

        {{-- Action --}}
        @if ($album->user_id === Auth::id())
            <div class="grid grid-cols-12 col-span-12 mt-3 justify-items-center space-x-0">
                {{-- Edit --}}
                <form method="dialog" class="col-span-6">
                    <button wire:click.prevent onclick="main_modal.showModal()"
                        @click="$dispatch('main_modal', {
                                        id: {{ $albumId }},
                                        topDivider: true,
                                        bottomDivider: false,
                                        topClose: true,
                                        bottomClose: false,
                                        modalTitle: 'Edit Album',
                                        componentName: 'EditAlbum',
                                        modalTitleClass: 'font-bold text-center',
                                    }); $dispatch('edit_album', {id: {{ $albumId }}})"
                        class="btn btn-primary w-32">
                        Edit Album
                    </button>
                </form>

                {{-- Delete --}}
                <form method="dialog" class="col-span-6">
                    <button wire:click.prevent onclick="main_modal.showModal()"
                        @click="$dispatch('main_modal', {
                                        id: {{ $albumId }},
                                        topDivider: true,
                                        bottomDivider: false,
                                        topClose: true,
                                        bottomClose: false,
                                        modalTitle: 'Delete Album',
                                        componentName: 'DeleteAlbum',
                                        modalTitleClass: 'font-bold text-center',
                                    }); $dispatch('delete_album', {id: {{ $albumId }}})"
                        class="btn btn-error w-32">
                        Delete Album
                    </button>
                </form>
            </div>
        @endif

    </div>
</div>
