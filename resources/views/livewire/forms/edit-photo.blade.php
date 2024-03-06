<div class="mb-5">
    <form wire:submit.prevent='photoUpdate' class="grid grid-cols-12 gap-x-3">
        {{-- Photo Name/Title --}}
        <label class="form-control w-full col-span-6">
            <div class="label">
                <span class="label-text text-xs lg:text-sm capitalize">Title</span>
            </div>
            <input wire:model='photoTitle' type="text" placeholder="Title"
                class="input input-bordered w-full focus:outline-none text-xs lg:text-sm capitalize" />
            <div class="label">
                <div class="label">
                    @error('photoTitle')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </label>

        {{-- Album Category --}}
        <label class="form-control w-full col-span-6">
            <div class="label">
                <span class="label-text text-xs lg:text-sm">Album</span>
            </div>
            <select wire:model='photoAlbum'
                class="select select-bordered focus:outline-none text-xs lg:text-sm capitalize text-gray-400">
                @foreach ($albums as $album)
                    <option @if ($photoAlbum === $album->id) selected @endif value="{{ $album->id }}"
                        class="text-black capitalize">
                        {{ str_replace('-', ' ', $album->album_name) }}</option>
                @endforeach
            </select>
            <div class="label">
                @error('photoAlbum')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </label>

        {{-- Photo Description --}}
        <label class="form-control col-span-12">
            <div class="label">
                <span class="label-text text-xs lg:text-sm">Description</span>
            </div>
            <textarea wire:model='photoDescription' class="textarea textarea-bordered h-24 text-xs lg:text-sm focus:outline-none"
                placeholder="Album description"></textarea>
            <div class="label">
                @error('photoDescription')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </label>

        {{-- Image Upload --}}
        <div class="col-span-12">
            <div class="w-full">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50  hover:bg-gray-100">
                    @if ($photo->filename)
                        <div class="flex flex-col items-center justify-center p-1 w-full">
                            <img class="w-full rounded"
                                src="{{ empty(!$photoContent) ? $photoContent->temporaryUrl() : '/storage/img/photos/' . $photo->filename }}"
                                alt="photo-content">
                        </div>
                    @endif

                    <input id="dropzone-file" type="file" accept="image/png, image/jpg, image/jpeg" class="hidden"
                        wire:model='photoContent' />
                </label>

                <div class="label">
                    @error('photoContent')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Submit Button --}}
            <button @click="$dispatch('refresh_photo')" type="submit" class="col-span-12 w-full btn btn-primary">
                Update photo data
            </button>
        </div>
    </form>
</div>
