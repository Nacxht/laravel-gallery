<div class="mb-5">
    <form wire:submit.prevent='albumUpdate' class="grid grid-cols-12 gap-3">
        {{-- Album Name --}}
        <label class="form-control w-full col-span-12">
            <div class="label">
                <span class="label-text text-xs lg:text-sm">Album Name</span>
            </div>
            <input wire:model='albumName' type="text" placeholder="Album name"
                class="input input-bordered w-full focus:outline-none text-xs lg:text-sm capitalize" />
            <div class="label">
                @error('albumName')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <span class="text-xs text-red-500">{{ Session::get('album-dupe') }}</span>
            </div>
        </label>

        {{-- Album Description --}}
        <label class="form-control col-span-12">
            <div class="label">
                <span class="label-text text-xs lg:text-sm">Album Description</span>
            </div>
            <textarea wire:model='albumDescription' class="textarea textarea-bordered h-24 text-xs lg:text-sm focus:outline-none"
                placeholder="Album description"></textarea>
            <div class="label">
                @error('albumDescription')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </label>

        {{-- Submit Button --}}
        <button type="submit" class="col-span-12 btn btn-primary">
            Update album
        </button>
    </form>
</div>
