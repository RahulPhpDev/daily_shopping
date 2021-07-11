
<x-admin.layout>
<x-page-head/>

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
        @each('admin.driver.td-records', $records, 'record', 'partials.table.empty')
        </tbody>
    </table>
    {{ $records->links() }}
</div>
</x-admin.layout>
