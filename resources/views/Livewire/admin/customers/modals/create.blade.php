<div wire:ignore.self class="modal modal-info fade in" tabindex="-1" id="create-modal" role="dialog"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-custom">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}"
                    wire:click='cancel()'>
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"><i class="voyager-plus icon-aling"></i>&nbsp; New customer </h5>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Name:</label>
                        <input type="text" class="form-control" wire:model='name' placeholder="Name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Phone:</label>
                        <input type="number" class="form-control" wire:model='phone' placeholder="Phone">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Address:</label>
                        <input type="text" class="form-control" wire:model='address' placeholder="Address">
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold is-required">Countries:</label>
                        <select class="form-control" wire:model='countryId'>
                            <option value="">Seleccionar</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        @error('countryId')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-right" wire:click='store'>Save</button>
                <button type="button" class="btn btn-default pull right" wire:click='cancel()'>{{
                    __('voyager::generic.cancel') }}</button>
            </div>
        </div>
    </div>
</div>
