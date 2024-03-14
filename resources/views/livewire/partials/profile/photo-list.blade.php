<div wire:refresh_photo='$wire.$refresh()' class="h-fit grid grid-cols-12 gap-2">
    @foreach ($photos as $photo)
        <button class="col-span-4 lg:col-span-2"
            @click="$dispatch('image_modal', {
                            id: {{ $photo->id }},
                            topDivider: true,
                            bottomDivider: false,
                            topClose: true,
                            bottomClose: false,
                            modalTitle: 'Image Details',
                            componentName: 'ModalPhotoContent',
                            modalTitleClass: 'font-bold text-center',
                        })"
            onclick="image_modal.showModal()">
            <img class="rounded h-full w-full object-cover object-top aspect-square hover:opacity-70 transition-opacity duration-200"
                src="{{ url('storage/img/photos/' . $photo->filename) }}" alt="">
        </button>
    @endforeach
    {{-- Modal List --}}
    <livewire:components.modal-image />
</div>
