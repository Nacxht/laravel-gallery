<div class="mb-5">
    <form wire:submit.prevent='photoCreate' class="grid grid-cols-12 gap-x-3">
        {{-- Photo Name/Title --}}
        <label class="form-control w-full col-span-6">
            <div class="label">
                <span class="label-text text-xs lg:text-sm capitalize">Title</span>
            </div>
            <input wire:model='photoTitle' type="text" placeholder="Title" maxlength="20"
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
                <option class="capitalize" selected value="">Select Album</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" class="text-black capitalize">
                        {{ ucfirst(str_replace('-', ' ', $album->album_name)) }}</option>
                @endforeach
            </select>
            <div class="label">
                @error('photoAlbum')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </label>

        {{-- Album Description --}}
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
                    @if (!$photoContent)
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 ">
                                <span class="font-semibold">
                                    Click to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-gray-500 ">PNG, JPG or JPEG (Max. 1MB)</p>
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center p-1 w-full">
                            <img class="w-full rounded" src="{{ $photoContent->temporaryUrl() }}" alt="photo-content">
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
            <button type="submit" class="col-span-12 w-full btn btn-primary">
                Upload a photo
            </button>
        </div>
    </form>
</div>
