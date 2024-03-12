<div class="" wire:refresh_comment="$wire.$refresh()">
    {{-- Comments --}}
    @if (!count($comments))
        <div class="flex justify-center items-center h-80">
            <div class="text-center">
                <p class="text-lg font-bold text-gray-400">There are no comments at all yet</p>
                <p class="text-gray-400">Be the first to comment</p>
            </div>
        </div>
    @else
        <div class="flex overflow-y-auto">
            <div class="h-80">
                @foreach ($comments as $comment)
                    @php
                        $user = App\Models\User::find($comment->user_id);
                    @endphp

                    <div class="my-5">
                        <div>
                            {{-- Chat Bubble --}}
                            <div class="flex items-start gap-2.5">
                                {{-- Avatar --}}
                                @if ($user->avatar)
                                    <a href="{{ route('profile', ['username' => $user->username]) }}">
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ url('storage/img/avatar/' . $user->avatar) }}"
                                            alt="{{ $user->username . '_avatar' }}">
                                    </a>
                                @else
                                    <a href="">
                                        <img class="w-8 h-8 rounded-full" src="/default/user-default.png"
                                            alt="{{ $user->username . '_avatar' }}">
                                    </a>
                                @endif

                                {{-- Username, Actions & Date --}}
                                <div class="flex flex-col gap-1 w-auto max-w-[320px]">
                                    {{-- Date --}}
                                    <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                        <span class="text-sm font-semibold text-gray-900 hover:underline">
                                            <a href="{{ route('profile', ['username' => $user->username]) }}">
                                                {{ $user->username }}
                                            </a>
                                        </span>
                                        <span class="text-sm font-normal text-gray-500">
                                            {{ date('d F Y - H:i', strtotime($comment->created_at)) }}
                                        </span>
                                    </div>

                                    {{-- Comment --}}
                                    <div
                                        class="flex flex-col leading-1.5 p-4 border-gray-300 bg-gray-200 rounded-e-xl rounded-es-xl">

                                        <p class="text-sm font-normal text-gray-900">
                                            {{ $comment->comment }}
                                        </p>
                                    </div>

                                    {{-- Actions --}}
                                    @if (Auth::check() && Auth::user()->username === $user->username)
                                        <div class="flex gap-3">
                                            <button
                                                @click="$dispatch('main_modal', {
                                            id: {{ $comment->id }},
                                            topDivider: true,
                                            bottomDivider: false,
                                            topClose: true,
                                            bottomClose: true,
                                            modalTitle: 'Edit Comment',
                                            componentName: 'EditComment',
                                            modalTitleClass: 'font-bold text-center',
                                        })"
                                                class="text-xs font-normal text-primary">Edit</button>
                                            <button
                                                @click="$dispatch('main_modal', {
                                                id: {{ $comment->id }},
                                                topDivider: true,
                                                bottomDivider: false,
                                                topClose: true,
                                                bottomClose: false,
                                                modalTitle: 'Delete Comment',
                                                componentName: 'CommentDelete',
                                                modalTitleClass: 'font-bold text-center',
                                            })"
                                                class="text-xs font-normal text-error">Delete</button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    {{-- End --}}

    {{-- Comment Input --}}
    <div class="border-t rounded-t bg-white ">
        @if (!Auth::check())
            <div class="text-center pt-5 text-gray-600">
                Log in first to comment
            </div>
        @else
            <form wire:submit.prevent='commentSend'>
                <div class="flex items-center px-3 py-2 rounded-lg">
                    {{-- Avatar (Next Time 😂) --}}
                    <div></div>
                    {{-- *** --}}

                    {{-- Input --}}
                    <textarea id="chat" rows="1"
                        class="block mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:outline-none"
                        placeholder="Tulis komentar..." wire:model='commentInput'></textarea>
                    {{-- *** --}}

                    {{-- Send Button --}}
                    <button type="submit" wire:click="$refresh" @click="$dispatch('refresh_comment')"
                        class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-gray-300 transition-colors duration-200">
                        <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Send message</span>
                    </button>
                    {{-- *** --}}
                </div>
            </form>
        @endif
    </div>
    {{-- End --}}
</div>
