<div>
    @section('page_header')
        <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-basket"></i> Voucher
            </h1>
            @include('voyager::multilingual.language-selector')
        </div>
    @endsection
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-bordered">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form">
                                <div class="panel-body">
                                    <div class="form-group col-lg-12">
                                        <h5><i class="voyager-person icon-align"></i> Cliente</h5>
                                        <hr>
                                    </div>
                                    <div class="form-group col-lg-8" wire:ignore>
                                        <label for="">Cliente:</label>
                                        <select class="form-control select2" id="customersList" wire:model="customerId"
                                            onchange="updatedCustomer(this)">
                                            <option value="">Buscar cliente</option>
                                            {{-- @foreach ($customers as $customer)
                                                <option value="{{ $customer['id'] }}">
                                                    {{ $customer['first_name'] . ' ' . $customer['last_name'] }}
                                                </option>
                                            @endforeach
                                            @error('customerId')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <button class="btn btn-primary" style="margin-top:25px"
                                            wire:click="reloadClients()"> <i class="voyager-refresh"></i></button>
                                    </div>

                                    <div class="form-group col-lg-2">
                                        <a class="btn btn-success  pull-right" href="#" target="_blank"
                                            style="margin-top:25px"><i class="voyager-person icon-align"></i>
                                            Agregar cliente</a>
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="">Nombres:</label>
                                        <input type="text" class="form-control" wire:model="firstname"
                                            style="background-color: #fff" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">Apellidos:</label>
                                        <input type="text" class="form-control" wire:model="lastname"
                                            style="background-color: #fff" readonly>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="">Dirección:</label>
                                        <input type="text" class="form-control" wire:model="address_1"
                                            style="background-color: #fff" readonly>
                                    </div>


                                    <div class="form-group col-lg-12">
                                        <h5> <i class="voyager-basket icon-align"></i> Productos</h5>
                                        <hr>
                                    </div>
                                    <div class="form-group col-lg-12" style="margin-bottom: 20px">
                                        <button class="btn btn-success  pull-right" data-toggle="modal"
                                            data-target="#create-modal"><i class="voyager-basket icon-align"></i>
                                            Adicionar producto</button>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th width="10%"><small>Producto</small></th>
                                                        <th width="20%"><small>Descripción</small></th>
                                                        <th width="3%" class="text-center"><small>Cantidad</small>
                                                        </th>
                                                        <th width="5%" class="text-center"><small>Val. Unit</small>
                                                        </th>
                                                        <th width="5%" class="text-center"><small>Subtotal</small>
                                                        </th>
                                                        <th width="5%"><small class="pull-right">Acciones</small>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <tr>
                                                        <td colspan="4"><span class="pull-right"><strong>
                                                                    Total</strong></span>
                                                            </th>

                                                        <td colspan="2"><strong class="pull-right">$
                                                            </strong>
                                                            </th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4"><span class="pull-right"><strong>
                                                                    Total con descuento</strong></span>
                                                            </th>

                                                        <td colspan="2"><strong class="pull-right">$
                                                            </strong>
                                                            </th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @error('productsCart')
                                                <small class="text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <h5><i class="voyager-credit-cards icon-align"></i> Metodo de pago</h5>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="">Metodo de pago:</label>
                                        <select class="form-control" wire:model="paymentMethod">
                                            <option value="">Seleccionar</option>
                                            {{-- @foreach ($paymentMethods as $method)
                                            <option value="{{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                        </select>
                                        {{-- @error('paymentMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <h5> <i class="voyager-truck icon-align"></i> Metodo de envío</h5>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="">Metodo de envío:</label>
                                        <select class="form-control" wire:model="shippingMethod">
                                            <option value="">Seleccionar</option>
                                            {{-- @foreach ($shippingMethods as $method)
                                            <option value=" {{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                        </select>
                                        {{-- @error('shippingMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-bordered">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form">
                                <div class="panel-body">
                                    <div class="form-group col-lg-12">
                                        <h5><i class="voyager-check-circle icon-align"></i> Acciones</h5>
                                    </div>
                                    </hr>
                                    <div class="form-group col-lg-12">
                                        <label class="required"><strong> Estado del pedido:</strong></label>
                                        <select class="form-control" name="" id=""
                                            wire:model="status">
                                            <option value="">Seleccionar</option>
                                            <option value="pending">Pendiente de pago</option>
                                            <option value="processing">Procesando</option>
                                            <option value="on-hold">En espera</option>
                                            <option value="completed">Terminado</option>
                                            <option value="cancelled">Cancelado</option>
                                            <option value="refunded">Reintegrado</option>
                                            <option value="failed">Ha fallado</option>
                                            <option value="trash">Papelera</option>
                                        </select>
                                        @error('status')
                                            <div class="panel-body">
                                                <div class="form-group col-lg-12">
                                                    <h5><i class="voyager-person icon-align"></i> Cliente</h5>
                                                    <hr>
                                                </div>
                                                <div class="form-group col-lg-8" wire:ignore>
                                                    <label for="">Cliente:</label>
                                                    <select class="form-control select2" id="customersList"
                                                        wire:model="customerId" onchange="updatedCustomer(this)">
                                                        <option value="">Buscar cliente</option>
                                                        {{-- @foreach ($customers as $customer)
                                                <option value="{{ $customer['id'] }}">
                                                    {{ $customer['first_name'] . ' ' . $customer['last_name'] }}
                                                </option>
                                            @endforeach
                                            @error('customerId')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <button class="btn btn-primary" style="margin-top:25px"
                                                        wire:click="reloadClients()"> <i
                                                            class="voyager-refresh"></i></button>
                                                </div>

                                                <div class="form-group col-lg-2">
                                                    <a class="btn btn-success  pull-right" href="#" target="_blank"
                                                        style="margin-top:25px"><i class="voyager-person icon-align"></i>
                                                        Agregar cliente</a>
                                                </div>

                                                <div class="form-group col-lg-6">
                                                    <label for="">Nombres:</label>
                                                    <input type="text" class="form-control" wire:model="firstname"
                                                        style="background-color: #fff" readonly>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="">Apellidos:</label>
                                                    <input type="text" class="form-control" wire:model="lastname"
                                                        style="background-color: #fff" readonly>
                                                </div>
                                                <div class="form-group col-lg-6">
                                                    <label for="">Dirección:</label>
                                                    <input type="text" class="form-control" wire:model="address_1"
                                                        style="background-color: #fff" readonly>
                                                </div>


                                                <div class="form-group col-lg-12">
                                                    <h5> <i class="voyager-basket icon-align"></i> Productos</h5>
                                                    <hr>
                                                </div>
                                                <div class="form-group col-lg-12" style="margin-bottom: 20px">
                                                    <button class="btn btn-success  pull-right" data-toggle="modal"
                                                        data-target="#create-modal"><i
                                                            class="voyager-basket icon-align"></i>
                                                        Adicionar producto</button>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th width="10%"><small>Producto</small></th>
                                                                    <th width="20%"><small>Descripción</small></th>
                                                                    <th width="3%" class="text-center">
                                                                        <small>Cantidad</small>
                                                                    </th>
                                                                    <th width="5%" class="text-center"><small>Val.
                                                                            Unit</small>
                                                                    </th>
                                                                    <th width="5%" class="text-center">
                                                                        <small>Subtotal</small>
                                                                    </th>
                                                                    <th width="5%"><small
                                                                            class="pull-right">Acciones</small>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                <tr>
                                                                    <td colspan="4"><span class="pull-right"><strong>
                                                                                Total</strong></span>
                                                                        </th>

                                                                    <td colspan="2"><strong class="pull-right">$
                                                                        </strong>
                                                                        </th>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4"><span class="pull-right"><strong>
                                                                                Total con descuento</strong></span>
                                                                        </th>

                                                                    <td colspan="2"><strong class="pull-right">$
                                                                        </strong>
                                                                        </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        @error('productsCart')
                                                            <small class="text-danger"> {{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <h5><i class="voyager-credit-cards icon-align"></i> Metodo de pago</h5>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="">Metodo de pago:</label>
                                                    <select class="form-control" wire:model="paymentMethod">
                                                        <option value="">Seleccionar</option>
                                                        {{-- @foreach ($paymentMethods as $method)
                                            <option value="{{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                                    </select>
                                                    {{-- @error('paymentMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <h5> <i class="voyager-truck icon-align"></i> Metodo de envío</h5>
                                                </div>

                                                <div class="form-group col-lg-12">
                                                    <label for="">Metodo de envío:</label>
                                                    <select class="form-control" wire:model="shippingMethod">
                                                        <option value="">Seleccionar</option>
                                                        {{-- @foreach ($shippingMethods as $method)
                                            <option value=" {{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                                    </select>
                                                    {{-- @error('shippingMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                                </div>
                                            </div> <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <hr>

                                    <div class="form-group col-lg-12">
                                        <div class="panel-body">
                                            <div class="row no-margin-bottom">
                                                <div class="col-lg-10">
                                                    <textarea class="form-control" readonly style="background-color: #fff"></textarea>
                                                </div>
                                                <div class="col-lg-2">
                                                    <button class="btn btn-danger"><i
                                                            class="voyager-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12">
                                        <label for="" class="required"><strong> Notas del
                                                pedido:</strong></label>
                                        <textarea class="form-control " wire:model='note'></textarea>
                                        <button class="btn btn-primary pull-right"
                                            wire:click='addNote'>Agregar</button>
                                        @error('note')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label><strong> Aplicar cupón:</strong></label>
                                        <input type="text" class="form-control"
                                            placeholder="Código cupón de descuento" wire:model="coupon">
                                        @error('coupon')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        <button class="btn btn-primary pull-right"
                                            wire:click="verifyCoupon()">Aplicar</button>
                                    </div>
                                    <hr>
                                    <div class="form-group col-lg-12">
                                        <button class="btn btn-success btn-block" wire:click='store(0)'>
                                            Guardar</button>
                                    </div>
                                    <hr>
                                    <div class="form-group col-lg-12">
                                        <button class="btn btn-primary" style="width: 100%" wire:click='store(1)'>
                                            Guardar y
                                            Enviar</button>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
        <div class="col-md-8">
            <div class="panel panel-bordered">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form">
                            <div class="panel-body">
                                <div class="form-group col-lg-12">
                                    <h5><i class="voyager-person icon-align"></i> Cliente</h5>
                                    <hr>
                                </div>
                                <div class="form-group col-lg-8" wire:ignore>
                                    <label for="">Cliente:</label>
                                    <select class="form-control select2" id="customersList" wire:model="customerId"
                                        onchange="updatedCustomer(this)">
                                        <option value="">Buscar cliente</option>
                                        {{-- @foreach ($customers as $customer)
                                                <option value="{{ $customer['id'] }}">
                                                    {{ $customer['first_name'] . ' ' . $customer['last_name'] }}
                                                </option>
                                            @endforeach
                                            @error('customerId')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}
                                    </select>
                                </div>

                                <div class="form-group col-lg-2">
                                    <button class="btn btn-primary" style="margin-top:25px"
                                        wire:click="reloadClients()"> <i class="voyager-refresh"></i></button>
                                </div>

                                <div class="form-group col-lg-2">
                                    <a class="btn btn-success  pull-right" href="#" target="_blank"
                                        style="margin-top:25px"><i class="voyager-person icon-align"></i>
                                        Agregar cliente</a>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="">Nombres:</label>
                                    <input type="text" class="form-control" wire:model="firstname"
                                        style="background-color: #fff" readonly>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Apellidos:</label>
                                    <input type="text" class="form-control" wire:model="lastname"
                                        style="background-color: #fff" readonly>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Dirección:</label>
                                    <input type="text" class="form-control" wire:model="address_1"
                                        style="background-color: #fff" readonly>
                                </div>


                                <div class="form-group col-lg-12">
                                    <h5> <i class="voyager-basket icon-align"></i> Productos</h5>
                                    <hr>
                                </div>
                                <div class="form-group col-lg-12" style="margin-bottom: 20px">
                                    <button class="btn btn-success  pull-right" data-toggle="modal"
                                        data-target="#create-modal"><i class="voyager-basket icon-align"></i>
                                        Adicionar producto</button>
                                </div>

                                <div class="form-group col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="10%"><small>Producto</small></th>
                                                    <th width="20%"><small>Descripción</small></th>
                                                    <th width="3%" class="text-center"><small>Cantidad</small>
                                                    </th>
                                                    <th width="5%" class="text-center"><small>Val. Unit</small>
                                                    </th>
                                                    <th width="5%" class="text-center"><small>Subtotal</small>
                                                    </th>
                                                    <th width="5%"><small class="pull-right">Acciones</small>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <tr>
                                                    <td colspan="4"><span class="pull-right"><strong>
                                                                Total</strong></span>
                                                        </th>

                                                    <td colspan="2"><strong class="pull-right">$
                                                        </strong>
                                                        </th>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"><span class="pull-right"><strong>
                                                                Total con descuento</strong></span>
                                                        </th>

                                                    <td colspan="2"><strong class="pull-right">$
                                                        </strong>
                                                        </th>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @error('productsCart')
                                            <small class="text-danger"> {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <h5><i class="voyager-credit-cards icon-align"></i> Metodo de pago</h5>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="">Metodo de pago:</label>
                                    <select class="form-control" wire:model="paymentMethod">
                                        <option value="">Seleccionar</option>
                                        {{-- @foreach ($paymentMethods as $method)
                                            <option value="{{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                    </select>
                                    {{-- @error('paymentMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                </div>

                                <div class="form-group col-lg-12">
                                    <h5> <i class="voyager-truck icon-align"></i> Metodo de envío</h5>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="">Metodo de envío:</label>
                                    <select class="form-control" wire:model="shippingMethod">
                                        <option value="">Seleccionar</option>
                                        {{-- @foreach ($shippingMethods as $method)
                                            <option value=" {{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                    </select>
                                    {{-- @error('shippingMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-bordered">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form">
                            <div class="panel-body">
                                <div class="form-group col-lg-12">
                                    <h5><i class="voyager-check-circle icon-align"></i> Acciones</h5>
                                </div>
                                </hr>
                                <div class="form-group col-lg-12">
                                    <label class="required"><strong> Estado del pedido:</strong></label>
                                    <select class="form-control" name="" id="" wire:model="status">
                                        <option value="">Seleccionar</option>
                                        <option value="pending">Pendiente de pago</option>
                                        <option value="processing">Procesando</option>
                                        <option value="on-hold">En espera</option>
                                        <option value="completed">Terminado</option>
                                        <option value="cancelled">Cancelado</option>
                                        <option value="refunded">Reintegrado</option>
                                        <option value="failed">Ha fallado</option>
                                        <option value="trash">Papelera</option>
                                    </select>
                                    @error('status')
                                        <div class="panel-body">
                                            <div class="form-group col-lg-12">
                                                <h5><i class="voyager-person icon-align"></i> Cliente</h5>
                                                <hr>
                                            </div>
                                            <div class="form-group col-lg-8" wire:ignore>
                                                <label for="">Cliente:</label>
                                                <select class="form-control select2" id="customersList"
                                                    wire:model="customerId" onchange="updatedCustomer(this)">
                                                    <option value="">Buscar cliente</option>
                                                    {{-- @foreach ($customers as $customer)
                                                <option value="{{ $customer['id'] }}">
                                                    {{ $customer['first_name'] . ' ' . $customer['last_name'] }}
                                                </option>
                                            @endforeach
                                            @error('customerId')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}
                                                </select>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <button class="btn btn-primary" style="margin-top:25px"
                                                    wire:click="reloadClients()"> <i class="voyager-refresh"></i></button>
                                            </div>

                                            <div class="form-group col-lg-2">
                                                <a class="btn btn-success  pull-right" href="#" target="_blank"
                                                    style="margin-top:25px"><i class="voyager-person icon-align"></i>
                                                    Agregar cliente</a>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="">Nombres:</label>
                                                <input type="text" class="form-control" wire:model="firstname"
                                                    style="background-color: #fff" readonly>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Apellidos:</label>
                                                <input type="text" class="form-control" wire:model="lastname"
                                                    style="background-color: #fff" readonly>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label for="">Dirección:</label>
                                                <input type="text" class="form-control" wire:model="address_1"
                                                    style="background-color: #fff" readonly>
                                            </div>


                                            <div class="form-group col-lg-12">
                                                <h5> <i class="voyager-basket icon-align"></i> Productos</h5>
                                                <hr>
                                            </div>
                                            <div class="form-group col-lg-12" style="margin-bottom: 20px">
                                                <button class="btn btn-success  pull-right" data-toggle="modal"
                                                    data-target="#create-modal"><i class="voyager-basket icon-align"></i>
                                                    Adicionar producto</button>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th width="10%"><small>Producto</small></th>
                                                                <th width="20%"><small>Descripción</small></th>
                                                                <th width="3%" class="text-center">
                                                                    <small>Cantidad</small>
                                                                </th>
                                                                <th width="5%" class="text-center"><small>Val.
                                                                        Unit</small>
                                                                </th>
                                                                <th width="5%" class="text-center">
                                                                    <small>Subtotal</small>
                                                                </th>
                                                                <th width="5%"><small
                                                                        class="pull-right">Acciones</small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            <tr>
                                                                <td colspan="4"><span class="pull-right"><strong>
                                                                            Total</strong></span>
                                                                    </th>

                                                                <td colspan="2"><strong class="pull-right">$
                                                                    </strong>
                                                                    </th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4"><span class="pull-right"><strong>
                                                                            Total con descuento</strong></span>
                                                                    </th>

                                                                <td colspan="2"><strong class="pull-right">$
                                                                    </strong>
                                                                    </th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    @error('productsCart')
                                                        <small class="text-danger"> {{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <h5><i class="voyager-credit-cards icon-align"></i> Metodo de pago</h5>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="">Metodo de pago:</label>
                                                <select class="form-control" wire:model="paymentMethod">
                                                    <option value="">Seleccionar</option>
                                                    {{-- @foreach ($paymentMethods as $method)
                                            <option value="{{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                                </select>
                                                {{-- @error('paymentMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <h5> <i class="voyager-truck icon-align"></i> Metodo de envío</h5>
                                            </div>

                                            <div class="form-group col-lg-12">
                                                <label for="">Metodo de envío:</label>
                                                <select class="form-control" wire:model="shippingMethod">
                                                    <option value="">Seleccionar</option>
                                                    {{-- @foreach ($shippingMethods as $method)
                                            <option value=" {{ $method['id'] }}">{{ $method['title'] }}</option>
                                        @endforeach --}}
                                                </select>
                                                {{-- @error('shippingMethod')
                                        <small class="text-danger"> {{ $message }}</small>
                                    @enderror --}}
                                            </div>
                                        </div> <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <hr>

                                <div class="form-group col-lg-12">
                                    <div class="panel-body">
                                        <div class="row no-margin-bottom">
                                            <div class="col-lg-10">
                                                <textarea class="form-control" readonly style="background-color: #fff"></textarea>
                                            </div>
                                            <div class="col-lg-2">
                                                <button class="btn btn-danger"><i class="voyager-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-lg-12">
                                    <label for="" class="required"><strong> Notas del
                                            pedido:</strong></label>
                                    <textarea class="form-control " wire:model='note'></textarea>
                                    <button class="btn btn-primary pull-right" wire:click='addNote'>Agregar</button>
                                    @error('note')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-12">
                                    <label><strong> Aplicar cupón:</strong></label>
                                    <input type="text" class="form-control"
                                        placeholder="Código cupón de descuento" wire:model="coupon">
                                    @error('coupon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <button class="btn btn-primary pull-right"
                                        wire:click="verifyCoupon()">Aplicar</button>
                                </div>
                                <hr>
                                <div class="form-group col-lg-12">
                                    <button class="btn btn-success btn-block" wire:click='store(0)'>
                                        Guardar</button>
                                </div>
                                <hr>
                                <div class="form-group col-lg-12">
                                    <button class="btn btn-primary" style="width: 100%" wire:click='store(1)'>
                                        Guardar y
                                        Enviar</button>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
</div>
