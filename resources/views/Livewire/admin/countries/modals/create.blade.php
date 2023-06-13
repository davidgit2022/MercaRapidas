<div wire:ignore.self class="modal modal-info fade in" tabindex="-1" id="create-modal" role="dialog"
    data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-custom">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}"
                    wire:click='cancel()'>
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"><i class="voyager-plus icon-aling"></i>&nbsp;New countries</h5>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="form-group">
                        <label class="font-weight-bold is-required"><strong>Name:</strong></label>
                        <input type="text" class="form-control" wire:model='name' placeholder="Name">
                        @error('name')
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
