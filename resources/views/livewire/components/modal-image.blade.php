<dialog id="image_modal" class="modal" wire:ignore.self>

    <div class="modal-box rounded overflow-hidden">
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
        <div class="overflow-y-auto px-1 mb-3">
            <div class="h-[27rem]">
                @if ($componentName === 'ModalPhotoContent')
                    <div class="grid grid-cols-12 justify-items-center mb-3">
                        {{-- Image --}}
                        <img src="{{ url('storage/img/photos/' . $photo->filename) }}" alt="{{ $photo->title }}"
                            class="max-h-[15rem] rounded col-span-12">

                        {{-- Action --}}
                        @if ($photo->user_id === Auth::id())
                            <div class="grid grid-cols-12 col-span-12 mt-3 gap-3">
                                {{-- Edit --}}
                                <form method="dialog" class="col-span-6">
                                    <button onclick="main_modal.showModal()"
                                        @click="$dispatch('main_modal', {
                                        id: {{ $photo->id }},
                                        topDivider: true,
                                        bottomDivider: false,
                                        topClose: true,
                                        bottomClose: false,
                                        modalTitle: 'Edit Photo',
                                        componentName: 'EditPhoto',
                                        modalTitleClass: 'font-bold text-center',
                                    });
                                    $dispatch('edit_photo', {id: {{ $photo->id }}})"
                                        class="btn btn-primary w-32">
                                        Edit Photo
                                    </button>
                                </form>

                                {{-- Delete --}}
                                <form method="dialog" class="col-span-6">
                                    <button onclick="main_modal.showModal()"
                                        @click="$dispatch('main_modal', {
                                        id: {{ $photo->id }},
                                        topDivider: true,
                                        bottomDivider: false,
                                        topClose: true,
                                        bottomClose: false,
                                        modalTitle: 'Delete Photo',
                                        componentName: 'DeletePhoto',
                                        modalTitleClass: 'font-bold text-center',
                                    });
                                    $dispatch('delete_photo', {id: {{ $photo->id }}})"
                                        class="btn btn-error w-32">
                                        Delete Photo
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>


                    {{-- Details --}}
                    <div>
                        {{-- Title --}}
                        <p class="font-semibold capitalize mb-2">
                            {{ str_replace('-', ' ', $photo->title) }}
                        </p>

                        {{-- Description --}}
                        <p class="text-xs text-gray-500">
                            {{ $photo->description }}
                        </p>
                    </div>

                    {{-- Comments --}}
                    <div></div>
                @endif
            </div>
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
