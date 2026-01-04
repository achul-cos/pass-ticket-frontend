<div
    wire:loading.flex
    wire:target="fecthPenumpang"
    class="fixed inset-0 z-[9999] items-center justify-center bg-dark/40 select-none overflow-hidden"
    role="status"
    aria-live="polite"
>
    <div wire:loading.delay class="flex flex-col items-center gap-4">
        <img src="{{ asset('img/gif/pass_loading.gif') }}" alt="Loading" class="w-30 h-30" draggable="false">
        <p class="font-bold italic text-2xl">Loading...</p>
    </div>
</div>