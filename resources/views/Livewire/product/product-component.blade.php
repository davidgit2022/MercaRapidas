<div>
    @include('livewire.product.modals.create')
    @include('livewire.product.modals.edit')
    @include('livewire.product.modals.delete')
    @include('livewire.product.modals.show')
    @section('page_header')
        <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-shop icon-aling"></i>Productos
            </h1>
            <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
                <i class="voyager-shop"></i><span>&nbsp;Nuevo</span>
            </button>
            @include('voyager::multilingual.language-selector')
        </div>
    @endsection
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="font-weight-bold">Desde:</label>
                                <input type="date" name="from" class="form-control" wire:model="from">
                            </div>
                            <div class="col-lg-2">
                                <label class="font-weight-bold">Hasta:</label>
                                <input type="date" name="to" class="form-control" wire:model="to">
                            </div>
                            <div class="col-lg-3">
                                <label class="font-weight bold">Buscar producto:</label>
                                <input type="text" class="form-control" wire:model='productName'
                                    placeholder="Buscar producto">
                            </div>
                            <div class="col-lg-3">
                                <label class="font-weight bold">Línea de producción:</label>
                                <select class="form-control" wire:model="lineProduct">
                                    <option value="">Seleccionar</option>
                                    @foreach ($products_lines as $products_line)
                                        <option value="{{ $products_line->id }}">{{ $products_line->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-success" wire:click="resetFilter" style="margin-top: 25px"><i
                                        class="voyager-refresh"></i> Limpiar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Acciones</th>
                                                <th>Nombre</th>
                                                <th>Precio de compra</th>
                                                <th>Precio de venta</th>
                                                <th>Lìnea de producciòn</th>
                                                <th>Fecha de compra</th>
                                                <th>Cantidad</th>
                                                {{-- <th>Total productos</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-success"
                                                            data-toggle="modal" data-target="#show-modal"
                                                            wire:click="showTotal({{ $product->id }})"
                                                            style="padding: 5px;5px"><i class="voyager-list"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-warning btn-sm"
                                                            data-toggle="modal" data-target="#edit-modal"
                                                            wire:click='edit({{ $product->id }})'
                                                            style="padding: 5px;5px"><i class="voyager-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            data-toggle="modal" data-target="#delete-modal"
                                                            wire:click='delete({{ $product->id }})'
                                                            style="padding: 5px;5px"><i class="voyager-trash"></i>
                                                        </button>
                                                    </td>
                                                    <td>{{ substr($product->name, 0, 17) . '...' }}</td>
                                                    <td>{{ number_format($product->purchese_value, 0, ',', '.') }}
                                                    </td>
                                                    <td>{{ number_format($product->sale_value, 0, ',', '.') }}</td>
                                                    <td>{{ $product->name_production }}</td>
                                                    <td>{{ $product->date_created }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            wire:click='diminishCant({{ $product->id }})'
                                                            style="padding: 5px;5px"><i class="voyager-angle-left"></i>
                                                        </button>
                                                        {{ $product->count }}
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                            wire:click='addCant({{ $product->id }})'
                                                            style="padding: 5px;5px"><i class="voyager-angle-right"></i>
                                                        </button>
                                                    </td>
                                            @endforeach
                                            <table></table>
                                            {{-- <td>
                                                        {{ $this->totalProducts }}
                                                    </td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Total productos</th>
                                                <th>Ganacia total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $this->totalProducts }}</td>
                                                <td>{{ $this->totalProducts }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
