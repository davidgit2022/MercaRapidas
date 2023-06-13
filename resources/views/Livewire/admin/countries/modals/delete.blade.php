<div wire:ignore.self class="modal modal-danger fade" tabindex="-1" id="delete-modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-custom">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}"
                    wire:click='cancel()'>
                    <span aria-hidden="true">&times</span>
                </button>
                <h4 class="modal-title"><i class="voyager-trash"></i>{{ __('voyager::generic.delete_question') }} the
                    country?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right delete-confirm" wire:click='destroy()'>{{
                    __('voyager::generic.delete_confirm') }}
                </button>
                <button class="btn btn-default pull-right" wire:click='cancel()'>
                    {{ __('voyager::generic.cancel') }}
                </button>
            </div>
        </div>
    </div>
</div>
