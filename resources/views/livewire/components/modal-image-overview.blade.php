<dialog id="overview_modal" wire:ignore.self class="modal">
    @if ($photo)
        <div
            class="modal-box bg-transparent shadow-none border border-gray-400 p-0 w-fit max-w-[20rem] backdrop-blur-lg">
            <img src="{{ url('storage/img/photos/' . $photo->filename) }}" alt="">
        </div>
    @endif

    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
