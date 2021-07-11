    <x-page-head/>
    @include('livewire.admin.user.create')
    @includeIf('livewire.admin.user.edit' , [$updateModel, true])
    <div class="col s12">

        <table class="responsive-table bordered striped Highlight">
            <thead class="text-warning">
            {{$updateModel}}
            @component('partials.th',
                        [
                            'tableHeads' =>
                                ['ID', 'Name','Email', 'phone', 'Role' ,'Action']
                        ])
            @endcomponent

            </thead>
            <tbody>
                     @each('livewire.admin.user.td-records', $records, 'record', 'partials.table.empty')
            </tbody>
        </table>
        {{ $records->links() }}
         </div>
     </div>
    </div>

    </div>
    </div>
    </div>

