<div wire:ignore.self class="modal modal-info fade in" tabindex="-1" id="edit-modal" role="dialog" data-keyboard="false"
    data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-custom">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}"
                    wire:click='cancel()'>
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"><i class="voyager-basket icon-aling"></i> Editar línea de producción</h5>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Nombre:</label>
                        <input type="text" class="form-control" wire:model='name' placeholder="Nombre">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" wire:click='update()'>Guardar</button>
                <button type="button" class="btn btn-default pull-right" wire:click='cancel()'>{{
                    __('voyager::generic.cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>
