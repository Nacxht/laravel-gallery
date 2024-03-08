<div class="pb-3">
    <form wire:submit.prevent='editComment'>
        <label class="form-control">
            <div class="label">
                <span class="label-text">Comment</span>
            </div>
            <textarea wire:model='editCommentInput' class="textarea textarea-bordered h-24"></textarea>
        </label>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button wire:click.prevent
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
                class="btn
                btn-error">Cancel</button>
        </div>
    </form>
</div>
