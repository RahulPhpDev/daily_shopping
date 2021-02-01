
<x-page-head/>
                @include('livewire.admin.vehicle.create')
                @include('livewire.admin.vehicle.edit')

                <div class="col s12">
                    <table class="responsive-table bordered striped Highlight">
                        <thead class="text-warning">
                        @component('partials.th',
                                    [
                                        'tableHeads' =>
                                            ['ID', 'Name','Vehicle Type', 'Number', 'Details' ,'Action']
                                    ])

                        @endcomponent

                        </thead>
                        <tbody>
                        @forelse($records as $record)
                            <tr>
                                <td> {{ $record->id }} </td>
                                <td> {{ $record->id }} </td>
                                <td> {{ $record->id }} </td>
                                <td> {{ $record->id }} </td>
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
