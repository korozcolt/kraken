<div>
    <x-jet-danger-button wire:click="$set('open',true)">
        Agregar Coordinador
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar información a la lista coordinador
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Nombre"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="name"></x-jet-input>
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Apellido"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="last"></x-jet-input>
                <x-jet-input-error for="last"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Cedula"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="dni"></x-jet-input>
                <x-jet-input-error for="dni"></x-jet-input-error>
            </div>
            <div class="mb-4">
                <x-jet-label value="Teléfono"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="phone"></x-jet-input>
                <x-jet-input-error for="phone"></x-jet-input-error>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open',false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Guardar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
