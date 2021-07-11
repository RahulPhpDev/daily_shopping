<div class="col s12 m12 l12">
    <div id="responsive-table" class="card card card-default scrollspy">
        <div class="card-content">
            <h4 class="card-title">Vehicle Type</h4>

            <div class="row">
                @include('livewire.admin.vehicle-type.create')
                @include('livewire.admin.vehicle-type.edit')

                <div class="col s12">
                    <table class="responsive-table bordered striped Highlight">


                        <thead class="text-warning">
                        <th>ID</th>
                        <th>Name </th>
                        <th> Action </th>
                        </thead>
                        <tbody>
                        @forelse($records as $record)
                            <tr>
                                <td> {{ $record->id }} </td>
                                <td> {{ $record->name }} </td>
                                <td>

                                    <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3"
                                       wire:click="edit({{ $record->id }})"
                                       href="#editModal">Edit</a>

                                    <button  class="waves-effect waves-light btn gradient-45deg-light-warning-cyan z-depth-4" wire:click="delete({{ $record->id }})">
                                        Delete

                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"> No record found</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>
                    {{ $records->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
</div>
