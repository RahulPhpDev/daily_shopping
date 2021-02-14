<x-admin.layout>
    <div class="col s12">
        <div class="container">
            <div class="seaction">

                <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">Add Vehicle/Location For {{ $user->name}}.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col s12 m12 l12">
                        <div id="inline-form" class="card card card-default scrollspy">

                    @includeWhen(count($records->location) , 'admin.driver.user-location.user-driver-location', ['records' => $records])
                        </div>
                    </div>

                    <form enctype="multipart/form-data" method="post" action ="{{route('admin.driver.location.store', $user->id)}}" id ="form">

                        @csrf

                        @include('admin.driver.form.create-driver-location')

                    </form>
                </div>
            </div>
</x-admin.layout>

<script>
    function vehicleTypeChange()
    {
        const vehicleTypeId = $("#vehicle_type_id").val();
        $.ajax( {
            url: '/admin/driver/location-options/'+vehicleTypeId,
            type: 'GET',
            content: 'text/html',
            success:function(data){
                $("#vehicle_select").html(data);
                console.log(data)
        },
        error: function (err) {
                console.log(err);
        }
        })
    }


    $("#addMore").on('click', function() {
        console.log('clicked');
        let count_times = $("#count_times").val();
        ++count_times;
        $.ajax({
            url: "/admin/product/add-more-attribute/"+count_times,
            type: 'GET',
            content: 'text/html',
            success:function(data){
                $("#append_attribute").append(data);
            },
            error: function(err)
            {
                console.log(err)
            },
            complete: function(){
                console.log('completed');
                $("#count_times").val(count_times);
                if ( count_times >= 5)
                {
                    $('#addMore').hide();
                }
            }
        })
    });

</script>
