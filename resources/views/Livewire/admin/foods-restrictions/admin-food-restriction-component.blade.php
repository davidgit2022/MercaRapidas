<div>
    @include('Livewire.admin.foods-restrictions.modals.create')
    @include('Livewire.admin.foods-restrictions.modals.edit')
    @include('Livewire.admin.foods-restrictions.modals.delete')
    @section('page_header')
        <div class="container-fluid">
            <h1 class="page-title">
                <i class="voyager-people icon-aling"></i>Food Restriction
            </h1>
            <button class="btn btn-success btn-add-new" data-toggle="modal" data-target="#create-modal">
                <i class="voyager-people icon-aling"></i><span>&nbsp;New</span>
            </button>
            @include('voyager::multilingual.language-selector')
        </div>
    @endsection
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Description</th>
                                        <th>Details</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach ($foodRestrictions as $foodRestriction)
                                    <tbody>
                                        <tr>
                                            <td>{{ $foodRestriction->id }}</td>
                                            <td>{{ $foodRestriction->description }}</td>
                                            <td>{{ $foodRestriction->details }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    data-toggle="modal" data-target="#edit-modal"
                                                    wire:click='edit({{ $foodRestriction->id }})' style="padding: 5px;5px"><i
                                                        class="voyager-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete-modal" wire:click='delete({{ $foodRestriction->id }})'
                                                    style="padding: 5px;5px"><i class="voyager-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
