<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-950">
    <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-950">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <!-- Logo Section -->
        <a href="{{ route('dashboard') }}" class="mb-8 flex items-center space-x-2 px-3 rtl:space-x-reverse"
            wire:navigate>
            <div
                class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500">
                <span class="text-lg font-bold text-white">K</span>
            </div>
            <span class="hidden text-xl font-bold text-zinc-900 dark:text-white xl:inline">Connect</span>
        </a>

        <!-- Navigation Menu -->
        <flux:navlist variant="outline" class="space-y-2 px-2">
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                wire:navigate class="rounded-lg">
                <span class="font-medium">{{ __('Beranda') }}</span>
            </flux:navlist.item>
            <flux:navlist.item icon="magnifying-glass" :href="route('dashboard')" wire:navigate class="rounded-lg">
                <span class="font-medium">{{ __('Jelajahi') }}</span>
            </flux:navlist.item>
            <flux:navlist.item icon="heart" :href="route('dashboard')" wire:navigate class="rounded-lg">
                <span class="font-medium">{{ __('Notifikasi') }}</span>
            </flux:navlist.item>
            <flux:navlist.item icon="envelope" :href="route('dashboard')" wire:navigate class="rounded-lg">
                <span class="font-medium">{{ __('Pesan') }}</span>
            </flux:navlist.item>
            <flux:navlist.item icon="bookmark" :href="route('dashboard')" wire:navigate class="rounded-lg">
                <span class="font-medium">{{ __('Simpanan') }}</span>
            </flux:navlist.item>
        </flux:navlist>


        <!-- Buat Postingan Button -->
        <div class="mb-6 px-2">
            <button onclick="Livewire.dispatch('openCreateModal')"
                class="w-full rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-6 py-3 font-semibold text-white shadow-md transition hover:shadow-lg hover:from-pink-600 hover:to-rose-600">
                ➕ {{ __('Buat') }}
            </button>
        </div>

        <flux:spacer />

        <!-- Desktop User Menu -->
        <div class="hidden lg:block px-2 mb-2">
            <flux:dropdown position="top" align="start">
                <button
                    class="w-full flex items-center gap-3 rounded-lg px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition">
                    <span
                        class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-full bg-gradient-to-br from-pink-500 to-rose-500">
                        <span class="flex h-full w-full items-center justify-center text-sm font-bold text-white">
                            {{ Auth::user()->initials() }}

                        </span>
                    </span>
                    <div class="hidden flex-1 text-start text-sm xl:block">
                        <span
                            class="block truncate font-semibold text-zinc-900 dark:text-white">{{ Auth::user()->name }}</span>
                        <span
                            class="block truncate text-xs text-zinc-500 dark:text-zinc-400">{{ strtolower(str_replace(' ', '_', Auth::user()->name)) }}</span>
                    </div>
                    <flux:icon icon="chevron-up" variant="mini" class="hidden xl:block" />
                </button>

                <flux:menu>
                    <flux:menu.item :href="route('profile.edit')" icon="user" wire:navigate>
                        {{ __('Profil Saya') }}
                    </flux:menu.item>
                    <flux:menu.item icon="cog-6-tooth" wire:navigate>
                        {{ __('Pengaturan') }}
                    </flux:menu.item>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle"
                            class="w-full text-red-600 dark:text-red-400">
                            {{ __('Keluar') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </div>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="border-t border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-950 lg:hidden">
        <div class="flex items-center gap-10">
            <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                wire:navigate class="flex-1 rounded-lg" />
            <flux:navlist.item icon="magnifying-glass" wire:navigate class="flex-1 rounded-lg" />
            <flux:navlist.item icon="plus" wire:navigate class="flex-1 rounded-lg" />
            <flux:navlist.item icon="heart" wire:navigate class="flex-1 rounded-lg" />
            <flux:navlist.item icon="user" :href="route('profile.edit')" wire:navigate class="flex-1 rounded-lg" />
        </div>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>
