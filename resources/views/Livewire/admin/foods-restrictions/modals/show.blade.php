<div wire:ignore.self class="modal modal-info fade in" tabindex="-1" id="show-modal" role="dialog" data-keyboard="false"
    data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-custom">
                <button type="button" class="close" aria-label="{{ __('voyager::generic.close') }}"
                    wire:click='cancel()'><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title"><i class="voyager-plus icon-aling"></i> Utilidades del producto:
                    <i>{{ $name }}</i> </h5>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="form-group col-lg-12">
                        <div class="col-lg-6">
                            <label class="font-weight-bold text-center">Utilidad(unidad):</label>
                            <input type="text" class="form-control" readonly style="background-color: #fff"
                                value="${{ number_format($unitGain, '0', ',', '.') }} Pesos">
                        </div>
                        <div class="col-lg-6">
                            <label for="" class="font-weight-bold">Utilidad(Total)</label>
                            <input type="text" class="form-control" readonly style="background-color: #fff"
                                value="${{ number_format($totalGain, '0', ',', '.') }} Pesos">
                        </div>
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="col-lg-6">
                            <label class="font-weight-bold text-center">Valor total compras:</label>
                            <input type="text" class="form-control" readonly style="background-color: #fff"
                                value="${{ number_format($this->totalPurchaseCost, '0', ',', '.') }} Pesos">
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold text-center">Valor total ventas:</label>
                            <input type="text" class="form-control" readonly style="background-color: #fff"
                                value="${{ number_format($this->totalProfitSale, '0', ',', '.') }} Pesos">
                        </div>
                    </div>
                    {{-- <div class="form-group col-lg-12">
                        <div class="col-lg-12">
                            <label for="" class="font-weight-bold">Porcentaje de ganancia(Unidad)</label>
                            <input type="text" class="form-control" readonly style="background-color: #fff"
                                value="{{ number_format($profitPercentage, '0', ',', '.') }} %">
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-right" wire:click='cancel()'
                    style="margin-top: 15px; margin-right:30px">Cerrar</button>
            </div>
        </div>
    </div>
</div>
