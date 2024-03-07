<div class="pt-[6rem]">
    <div class="grid grid-cols-12 gap-3 justify-items-center">
        @foreach ($photos as $photo)
            <div class="col-span-12 gap-3">
                <livewire:components.image-post-card :photoData='$photo' :key='$photo->id' />
            </div>
        @endforeach
    </div>
</div>
