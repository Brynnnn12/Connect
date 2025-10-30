<div>
    <!-- Modal Overlay -->
    @if ($showModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">
            <div class="w-full max-w-md rounded-2xl bg-white p-6 shadow-2xl dark:bg-zinc-900">
                <!-- Header -->
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-zinc-900 dark:text-white">
                        {{ $postId ? 'Edit Postingan' : 'Buat Postingan' }}
                    </h2>
                    <button wire:click="resetForm"
                        class="text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 dark:hover:text-zinc-200">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- User Info -->
                <div class="mb-6 flex items-center gap-3">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500">
                        <span class="text-lg font-bold text-white">
                            {{ auth()->user()->initials() }}
                        </span>
                    </div>
                    <div>
                        <p class="font-semibold text-zinc-900 dark:text-white">{{ auth()->user()->name }}</p>

                    </div>
                </div>

                <!-- Form -->
                <form wire:submit="save" class="space-y-4">
                    <!-- Textarea -->
                    <div>

                        <textarea wire:model.debounce.300ms="content" placeholder="Apa yang sedang Anda pikirkan? 💭"
                            class="w-full resize-none rounded-lg border-0 bg-zinc-100 p-4 text-lg placeholder-zinc-500 focus:bg-zinc-50 focus:ring-2 focus:ring-pink-500 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-400 dark:focus:bg-zinc-700"
                            rows="5"></textarea>


                        @error('content')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3 pt-4">
                        <button type="button" wire:click="resetForm"
                            class="flex-1 rounded-full border-2 border-zinc-300 px-6 py-3 font-semibold text-zinc-900 transition hover:bg-zinc-100 dark:border-zinc-600 dark:text-white dark:hover:bg-zinc-800">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-6 py-3 font-semibold text-white shadow-md transition hover:from-pink-600 hover:to-rose-600 hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled" wire:target="save"
                            disabled="{{ empty($content) ? 'disabled' : '' }}">
                            <span wire:loading.remove wire:target="save">{{ $postId ? 'Update' : 'Posting' }}</span>
                            <span wire:loading wire:target="save">Menyimpan...</span>
                        </button>
                    </div>

                    <!-- Session Flash Message -->
                    @if (session()->has('message'))
                        <div
                            class="rounded-lg bg-green-100 p-3 text-sm text-green-700 dark:bg-green-900 dark:text-green-200">
                            ✅ {{ session('message') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    @endif
</div>
