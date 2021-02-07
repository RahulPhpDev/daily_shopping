
<x-page-head/>
                @include('livewire.admin.unit.create')
                <div class="col s12">
                    <table class="responsive-table bordered striped Highlight">
                        <thead class="text-warning">
                        @component('partials.th',
                                    [
                                        'tableHeads' =>
                                            ['ID','Abbreviation', 'Name', 'Action']
                                    ])
                        @endcomponent

                        </thead>
                        <tbody>
                        @each('livewire.admin.unit.td-records', $records, 'record', 'partials.table.empty')
                        </tbody>
                    </table>
                    {{ $records->links() }}
                </div>
            </div>
        </div>

    </div>
</div>
</div>
