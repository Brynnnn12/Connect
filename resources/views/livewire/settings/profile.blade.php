<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<section class="w-full">
    <div class="min-h-screen bg-white dark:bg-zinc-950">
        <!-- Profile Header -->
        <div class="border-b border-zinc-200 dark:border-zinc-700">
            <div class="mx-auto max-w-4xl px-4 py-8">
                <!-- Profile Info Container -->
                <div class="flex flex-col sm:flex-row gap-8 items-start sm:items-center">
                    <!-- Avatar -->
                    <div
                        class="flex h-32 w-32 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500 flex-shrink-0">
                        <span class="text-5xl font-bold text-white">
                            {{ Auth::user()->initials() }}
                        </span>
                    </div>

                    <!-- Profile Details -->
                    <div class="flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-4">
                            <h1 class="text-3xl font-bold text-zinc-900 dark:text-white">
                                {{ Auth::user()->name }}
                            </h1>
                            <button wire:click="$parent.edit"
                                class="rounded-full border-2 border-zinc-300 px-8 py-2 font-semibold text-zinc-900 transition hover:bg-zinc-100 dark:border-zinc-600 dark:text-white dark:hover:bg-zinc-800">
                                Edit Profil
                            </button>
                        </div>

                        <!-- Stats -->
                        <div class="flex gap-8 mb-6">
                            <div class="text-center sm:text-left">
                                <p class="text-2xl font-bold text-zinc-900 dark:text-white">
                                    {{ Auth::user()->posts()->count() }}
                                </p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">Postingan</p>
                            </div>
                            <div class="text-center sm:text-left">
                                <p class="text-2xl font-bold text-zinc-900 dark:text-white">
                                    {{ Auth::user()->followers()->count() }}
                                </p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">Pengikut</p>
                            </div>
                            <div class="text-center sm:text-left">
                                <p class="text-2xl font-bold text-zinc-900 dark:text-white">
                                    {{ Auth::user()->following()->count() }}
                                </p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">Mengikuti</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <p class="text-zinc-600 dark:text-zinc-400">
                            {{ Auth::user()->email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Settings Section -->
        <div class="mx-auto max-w-4xl px-4 py-8">
            <div class="rounded-2xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900 p-6">
                <h2 class="text-2xl font-bold text-zinc-900 dark:text-white mb-6">Pengaturan Profil</h2>

                <form wire:submit="updateProfileInformation" class="space-y-6">
                    <!-- Name Input -->
                    <div>
                        <label class="block text-sm font-medium text-zinc-900 dark:text-white mb-2">
                            Nama
                        </label>
                        <input wire:model="name" type="text" required autofocus autocomplete="name"
                            class="w-full rounded-lg border border-zinc-300 bg-white px-4 py-2 text-zinc-900 placeholder-zinc-500 transition focus:border-pink-500 focus:ring-2 focus:ring-pink-500/20 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-400" />
                        @error('name')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label class="block text-sm font-medium text-zinc-900 dark:text-white mb-2">
                            Email
                        </label>
                        <input wire:model="email" type="email" required autocomplete="email"
                            class="w-full rounded-lg border border-zinc-300 bg-white px-4 py-2 text-zinc-900 placeholder-zinc-500 transition focus:border-pink-500 focus:ring-2 focus:ring-pink-500/20 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-400" />
                        @error('email')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror

                        @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !auth()->user()->hasVerifiedEmail())
                            <div
                                class="mt-4 p-4 bg-yellow-50 dark:bg-yellow-900/20 rounded-lg border border-yellow-200 dark:border-yellow-700">
                                <p class="text-sm text-yellow-800 dark:text-yellow-300">
                                    {{ __('Email Anda belum diverifikasi.') }}
                                </p>
                                <button type="button" wire:click.prevent="resendVerificationNotification"
                                    class="mt-2 text-sm font-medium text-yellow-900 dark:text-yellow-200 hover:underline">
                                    {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                                </button>

                                @if (session('status') === 'verification-link-sent')
                                    <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                                        {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
                                    </p>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-3 pt-4 border-t border-zinc-200 dark:border-zinc-700">
                        <button type="submit"
                            class="flex-1 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-6 py-3 font-semibold text-white shadow-md transition hover:from-pink-600 hover:to-rose-600 hover:shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove>{{ __('Simpan Perubahan') }}</span>
                            <span wire:loading>Menyimpan...</span>
                        </button>
                    </div>

                    <!-- Success Message -->
                    @if (session()->has('success') || session()->has('status'))
                        <div
                            class="mt-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-lg border border-green-200 dark:border-green-700">
                            <p class="text-sm font-medium text-green-700 dark:text-green-400">
                                ✅ {{ __('Profil berhasil diperbarui!') }}
                            </p>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Delete Account Section -->
            <div class="mt-8 rounded-2xl border border-red-200 dark:border-red-700/30 bg-red-50 dark:bg-red-900/10 p-6">
                <h3 class="text-lg font-bold text-red-700 dark:text-red-400 mb-2">Hapus Akun</h3>
                <p class="text-sm text-red-600 dark:text-red-300 mb-4">
                    Setelah menghapus akun Anda, tidak ada cara untuk memulihkannya. Harap pastikan.
                </p>
                <livewire:settings.delete-user-form />
            </div>
        </div>
    </div>
</section>
