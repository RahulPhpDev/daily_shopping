    <x-page-head/>
    @include('livewire.admin.location.create')
    <div class="col s12">
        <table class="responsive-table bordered striped Highlight">
            <thead class="text-warning">
            @component('partials.th',
                        [
                            'tableHeads' =>
                                ['ID', 'State','City', 'Code', 'Landmark' ,'Action']
                        ])
            @endcomponent

            </thead>
            <tbody>
                     @each('livewire.admin.location.td-records', $records, 'record', 'partials.table.empty')
            </tbody>
        </table>
        {{ $records->links() }}
         </div>
     </div>
    </div>

    </div>
    </div>
    </div>

