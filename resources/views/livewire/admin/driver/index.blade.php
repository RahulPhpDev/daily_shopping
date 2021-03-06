    <x-page-head/>
    @include('livewire.admin.driver.create')
    <div class="col s12">
        <table class="responsive-table bordered striped Highlight">
            <thead class="text-warning">
            @component('partials.th',
                        [
                            'tableHeads' =>
                                $fields
                        ])
            @endcomponent

            </thead>
            <tbody>
                     @each('livewire.admin.driver.td-records', $records, 'record', 'partials.table.empty')
            </tbody>
        </table>
        {{ $records->links() }}
         </div>
     </div>
    </div>

    </div>
    </div>
    </div>

