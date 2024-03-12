<dialog id="main_modal" class="modal" wire:ignore.self>

    <div class="modal-box rounded">
        {{-- "X" Close Button --}}
        @if ($topClose)
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
        @endif

        {{-- Title --}}
        <h3 class="{{ $modalTitleClass }}">{{ $modalTitle }}</h3>

        {{-- Top Divider --}}
        @if ($topDivider)
            <div class="divider my-0 py-0"></div>
        @endif

        {{-- Content --}}
        <div class="overflow-y-auto px-1">
            @if ($componentName === 'AddAlbum')
                <livewire:forms.add-album />
            @endif

            @if ($componentName === 'UploadPhoto')
                <livewire:forms.upload-photo />
            @endif

            @if ($componentName === 'EditPhoto')
                <livewire:forms.edit-photo :photoId='$id' />
            @endif

            @if ($componentName === 'DeletePhoto')
                <livewire:partials.profile.delete-photo :photoId='$id' />
            @endif

            @if ($componentName === 'AlbumDetailsModal')
                <livewire:partials.profile.album-details-modal :albumId='$id' />
            @endif

            @if ($componentName === 'EditAlbum')
                <livewire:forms.edit-album :albumId='$id' />
            @endif

            @if ($componentName === 'DeleteAlbum')
                <livewire:partials.profile.delete-album :albumId='$id' />
            @endif

            @if ($componentName === 'PhotoCommentModal')
                <livewire:partials.index.photo-comment-modal :photoId='$id' />
            @endif

            @if ($componentName === 'EditComment')
                <livewire:forms.edit-comment :commentId='$id' />
            @endif

            @if ($componentName === 'CommentDelete')
                <livewire:partials.index.comment-delete :commentId='$id' />
            @endif

            @if ($componentName === 'UserEdit')
                <livewire:forms.user-edit />
            @endif
        </div>

        {{-- Bottom Divider --}}
        @if ($bottomDivider)
            <div class="divider my-0 py-0"></div>
        @endif

        {{-- Close Button --}}
        @if ($bottomClose)
            <div class="modal-action mt-0">
                <form method="dialog">
                    <!-- if there is a button in form, it will close the modal -->
                    <button class="btn">Close</button>
                </form>
            </div>
        @endif
    </div>

    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
