<x-admin.layout>
    <div class="col s12 m12 l12">
        <div id="responsive-table" class="card card card-default scrollspy">
            <div class="card-content">
                <h4 class="card-title camel-case">  Advertisement </h4>
                <div class="row">
                    <div class="col s12">
                        <a class="modal-trigger waves-effect pull-right waves-light btn gradient-45deg-light-blue-cyan z-depth-3 mb-2"
                           href={{route('admin.advertisement.create') }}>
                            Add Advertisement
                        </a>

                        <table class="responsive-table bordered striped Highlight">
                            <thead class="text-warning">
                            @component('partials.th',
                                        [
                                            'tableHeads' =>
                                                ['ID']
                                        ])
                            @endcomponent

                            </thead>
                            <tbody>
                            @each('admin.advertisement.td-records', $records, 'record', 'partials.table.empty')
                            </tbody>
                        </table>
                        {{ $records->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-admin.layout>

<script>
    function showAttribute(orderId)
    {
        $.ajax( {
            url: 'order/items/'+orderId,
            type: 'GET',
            content: 'text/html',
            success: function (data)
            {
                $('#order_items').html(data);
            },
            error: function(data)
            {
                console.log(data);
            }
        })
    }
        function test()
        {
            console.log('ds');
        }
        function assignDriver(attributeId, orderId)
        {
            const driverId =  $(`#driver_opt_${attributeId}`).val();
            console.log(driverId, 'driverId')
            if (driverId < 1) {
                alert(' Select Driver');
                return false;
            }
            $.ajax({
                method: 'POST',
                url: "{{ route('admin.order.assign-driver') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    order_id:orderId,
                    order_attribute_id:attributeId,
                    user_id: driverId
                },
                success:function(data) {
                    if ( data.status == 200)
                    {
                        $(`#driver_opt_${attributeId}`).hide();
                    }

                }
                // type:'js'
            })
        }
    </script>

