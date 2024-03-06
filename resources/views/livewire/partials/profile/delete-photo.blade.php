<div>
    <div class="p-4 md:p-5 text-center">
        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
            Are you sure you want to delete this photo?
        </h3>

        <div class="grid grid-cols-2 justify-items-center">
            <button wire:click='photoDelete' class="btn btn-error w-[10rem]">
                Yes I'm sure
            </button>

            <form method="dialog">
                <button
                    @click="$dispatch('image_modal', {
                            id: {{ $photoId }},
                            topDivider: true,
                            bottomDivider: false,
                            topClose: true,
                            bottomClose: false,
                            modalTitle: 'Image Details',
                            componentName: 'ModalPhotoContent',
                            modalTitleClass: 'font-bold text-center',
                        });
                        $dispatch('refresh_photo')"
                    onclick="image_modal.showModal()" class="btn btn-neutral w-[10rem]">No, cancel</button>
            </form>
        </div>
    </div>
</div>
