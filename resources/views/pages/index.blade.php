<div class="pt-[6rem] pb-5">
    <div
        @if (!count($photos)) class="grid grid-cols-12 gap-3 justify-items-center items-center h-[80dvh]" @else class="grid grid-cols-12 gap-3 justify-items-center" @endif>
        @forelse ($photos as $photo)
            <div class="col-span-12 gap-3">
                <livewire:components.image-post-card :photoData='$photo' :key='$photo->id' />
            </div>
        @empty
            <div class="col-span-12 text-gray-500 font-bold text-2xl select-none">
                There are no posts yet.
            </div>
        @endforelse
    </div>

    {{-- Modal --}}
    <livewire:components.modal />
    <livewire:components.modal-image-overview />
</div>
