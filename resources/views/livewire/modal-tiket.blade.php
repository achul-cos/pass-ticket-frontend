<x-modal wire:model="myModal1" title="Hey" class="backdrop-blur">
    Press `ESC`, click outside or click `CANCEL` to close.
 
    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.myModal1 = false" />
    </x-slot:actions>
</x-modal>