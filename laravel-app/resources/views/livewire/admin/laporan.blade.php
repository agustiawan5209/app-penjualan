<div>
    @include('sweetalert::alert')
    <br><br><br>
    <x-jet-secondary-button wire:click='OpenLaporan' class="shadow-sm shadow-white">Click Me!</x-jet-secondary-button>

    <x-jet-dialog-modal wire:model='openLaporan'>
        <x-slot name='title'></x-slot>
        <x-slot name='content'>
            @include('page.laporan.modal')
        </x-slot>
        <x-slot name='footer'>
            <x-jet-secondary-button wire:click="$toggle('openLaporan')" wire:loading.attr='disabled'>Close</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
