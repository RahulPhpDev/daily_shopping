<table class="responsive-table bordered striped Highlight">
    <thead class="text-warning">
    @component('partials.th',
                [
                    'tableHeads' =>
                        [
                             'id',
                             'Location',
                          //   'Delete'
                        ]
                ])
    @endcomponent

    </thead>
    <tbody>
    @each('admin.driver.user-location.td-records', $records->location, 'record', 'partials.table.empty')
    </tbody>
</table>
