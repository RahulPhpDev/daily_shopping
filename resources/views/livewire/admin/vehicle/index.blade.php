
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
                        @each('livewire.admin.vehicle.td-records', $records, 'record', 'partials.table.empty')
                        </tbody>
                    </table>
                    {{ $records->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
</div>
