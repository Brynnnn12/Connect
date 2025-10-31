<div>
    {{-- 3. VIEW (HTML) --}}
    <button wire:click="toggleLike" class="flex items-center space-x-2 group">
        <!-- Tampilkan ikon hati (SVG) -->
        <i
            class="fas fa-heart fa-lg transition-all duration-150 {{ $isLiked ? 'text-red-600 group-hover:text-red-500' : 'text-gray-500 group-hover:text-red-600' }}"></i>

        <!-- Tampilkan jumlah like -->
        <span class="text-sm font-medium {{ $isLiked ? 'text-red-600' : 'text-gray-500' }}">
            {{ $likeCount }}
        </span>
    </button>
</div>
