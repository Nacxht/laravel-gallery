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

        <div class="grid grid-cols-2 justify-items-center gap-3">
            <button wire:click='commentDelete' class="btn btn-error text-xs lg:text-sm w-full lg:w-[10rem] col-span-1">
                Yes I'm sure
            </button>

            <button
                @click="$dispatch('main_modal', {
                id: {{ $photo->id }},
                topDivider: true,
                bottomDivider: false,
                topClose: true,
                bottomClose: false,
                modalTitle: 'Comments',
                componentName: 'PhotoCommentModal',
                modalTitleClass: 'font-bold text-center',
            }); $dispatch('photo_comment', {id: {{ $photo->id }}})"
                onclick="image_modal.showModal()" class="btn btn-neutral text-xs lg:text-sm w-full lg:w-[10rem]">No,
                cancel</button>
        </div>
    </div>
</div>
