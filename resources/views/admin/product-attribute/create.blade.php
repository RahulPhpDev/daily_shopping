<x-admin.layout>
    <div class="col s12">
        <div class="container">
            <div class="section">

                <div class="card">
                    <div class="card-content">
                        <p class="caption mb-0">Add Product.</p>
                    </div>
                </div>

                <div class="row">
                    <!-- Form with validation -->
                    <form enctype="multipart/form-data" method="post"
                          action ="{{route('admin.attribute.store', [$product_id])}}"
                          id ="form">
                        @csrf
                        @include('admin.product.form.attribute')
                        <div class="row">
                            <div class="input-field col s12">
                                <button
                                    form="form"
                                    class="btn cyan waves-effect waves-light"
                                    type="submit"
                                    name="action">
                                    Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</x-admin.layout>


<script>
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
