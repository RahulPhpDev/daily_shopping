<x-admin.layout>
    <div class="col s12 m12 l12">
        <div id="responsive-table" class="card card card-default scrollspy">
            <div class="card-content">
                <h4 class="card-title camel-case">
                    Products - {{ $product->name }} Attribute
                </h4>
                <div class="row">
                    <div class="col s12">
                        <a
                            class="modal-trigger
                        waves-effect pull-right waves-light btn gradient-45deg-light-blue-cyan z-depth-3 mb-2"
                            href="{{route('admin.attribute.create', [$product->id])}}">
                            Add Attribute Product
                        </a>

                        <table class="responsive-table bordered striped Highlight">
                            <thead class="text-warning">
                            @component('partials.th',
                                        [
                                            'tableHeads' =>
                                                ['ID', 'Name', 'Brand', 'Buying Price' ,'Selling Price','Quantity','Image','Action']
                                        ])
                            @endcomponent

                            </thead>
                            <tbody>
                            @each('admin.product-attribute.td-records', $records, 'record', 'partials.table.empty')
                            </tbody>
                        </table>
                        {{ $records->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-admin.layout>
