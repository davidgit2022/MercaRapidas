<div>
    @include('livewire.product-line.modals.create')
    @include('livewire.product-line.modals.edit')
    @include('livewire.product-line.modals.delete')
    @section('page_header')
        <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-shop icon-aling"></i>Línea de producción
            </h1>
            <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
                <i class="voyager-shop icon-aling"></i><span>&nbsp;Nuevo</span>
            </button>
            @include('voyager::multilingual.language-selector')
        </div>
    @endsection
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="row no-margin-bottom">
                            <div class="col-lg-12">
                                <div wire:loading wire:target="edit" id="cover-spin"></div>
                                <div wire:loading wire:target="cancel" id="cover-spin"></div>
                            </div>
                        </div>
                        <div class="row no-margin-bottom">
                            @if (count($productions_lines) > 0)
                                @foreach ($productions_lines as $production_line)
                                    <div class="col-md-4">
                                        <div class="panel panel-border">
                                            <div class="panel-heading panel-bg">
                                                <h6 class="panel-title">
                                                    <i class="voyager-shop icon-align"></i>
                                                    <small style="color:blue" class="font-weight-bold">&nbsp;
                                                        {{ Str::limit($production_line->name, 30) }}</small>
                                                    <div
                                                        class="btn-group pull-right navbar-right panel-heading-btn-group">
                                                        <button class="btn dropdown-toggle panel-heading-button"
                                                            data-toggle="dropdown" data-tooltip="tooltip"
                                                            title="Ajustes"><i class="voyager-settings"></i></button>
                                                        <ul class="dropdown-menu panel-dropdown">
                                                            <li>
                                                                <a class="panel-dropdown-bottom"
                                                                    href="javascript:void(0);" data-toggle="modal"
                                                                    data-target="#edit-modal"
                                                                    wire:click="edit({{ $production_line->id }})">
                                                                    <i
                                                                        class="voyager-edit panel-dropdown-icon"></i>&nbsp;
                                                                    Editar
                                                                </a>
                                                            </li>
                                                            <li class="divider panel-dropdown-divider"></li>
                                                            <li>
                                                                <a class="panel-dropdown-bottom"
                                                                    href="javascript:void(0);" data-toggle="modal"
                                                                    data-target="#delete-modal"
                                                                    wire:click="delete({{ $production_line->id }})">
                                                                    <i
                                                                        class="voyager-trash panel-dropdown-icon"></i>&nbsp;
                                                                    Eliminar
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </h6>
                                            </div>
                                            <div class="panel-body" style="padding-top: 20px; height:150px">
                                                {{-- <h5 class="color-custom">{{ $production_line->id }}</h5> --}}
                                                <p style="text-align: justify; text-justify: inter-word;">
                                                    <small> {{ $production_line->name }}</small>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
