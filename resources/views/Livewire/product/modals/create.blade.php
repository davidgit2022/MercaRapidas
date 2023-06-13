<div wire:ignore.self class="modal modal-info fade in" tabindex="-1" id="create-modal" role="dialog"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-custom">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}"
                    wire:click='cancel()'>
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"><i class="voyager-plus icon-aling"></i> Añadir un nuevo producto</h5>
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
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Cantidad:</label>
                        <input type="number" class="form-control" wire:model='count' placeholder="Cantidad">
                        @error('count')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Precio de compra:</label>
                        <input type="number" class="form-control" wire:model='purchese_value' placeholder="Precio de compra">
                        @error('purchese_value')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Precio de venta:</label>
                        <input type="number" class="form-control" wire:model='sale_value' placeholder="Precio de venta">
                        @error('sale_value')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Lìnea de producciòn:</label>
                        <select class="form-control" wire:model='product_lineId'>
                            <option value="">Seleccionar</option>
                            @foreach ($products_lines as $product_line)
                                <option value="{{$product_line->id}}">{{$product_line->name}}</option>
                            @endforeach
                        </select>
                        @error('product_lineId')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Fecha de compra:</label>
                        <input type="date" class="form-control" wire:model='date_created' placeholder="Fecha de compra">
                        @error('date_created')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" wire:click='store'>Guardar</button>
                <button type="button" class="btn btn-default pull right" wire:click='cancel()'>{{
                    __('voyager::generic.cancel') }}</button>
            </div>
        </div>
    </div>
</div>
