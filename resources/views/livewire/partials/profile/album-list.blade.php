<div wire:refresh_album='$wire.$refresh()' class="grid grid-cols-12 h-fit gap-2">
    @foreach ($albums as $album)
        <button
            @click="$dispatch('main_modal', {
                            id: {{ $album->id }},
                            topDivider: true,
                            bottomDivider: false,
                            topClose: true,
                            bottomClose: false,
                            modalTitle: 'Album Details',
                            componentName: 'AlbumDetailsModal',
                            modalTitleClass: 'font-bold text-center',
                        }); $dispatch('album_detail', {id: {{ $album->id }}})"
            onclick="main_modal.showModal()"
            class="col-span-4 lg:col-span-2 btn-square aspect-square h-full w-full btn border border-gray-400 capitalize">
            {{ str_replace('-', ' ', $album->album_name) }}
        </button>
    @endforeach
</div>
