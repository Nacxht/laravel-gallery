<div class="col-span-12 h-full overflow-hidden">
    {{-- Title --}}
    <div>
        @if ($tabContent === 'photo')
            <p class="font-bold">Photos</p>
        @elseif ($tabContent === 'album')
            <p class="font-bold">Albums</p>
        @endif
        <div class="divider my-2"></div>
    </div>

    <div class="h-[27rem]">
        @if ($tabContent === 'photo')
            <livewire:partials.profile.photo-list :user='$user' />
        @elseif ($tabContent === 'album')
            <livewire:partials.profile.album-list :user='$user' />
        @endif

    </div>
</div>
