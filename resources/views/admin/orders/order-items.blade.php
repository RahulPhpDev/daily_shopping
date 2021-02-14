<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">
                <x-page-head flag="true" argument='list'/>
                <a href="javascript:void(0);"
                   class="red-text float-right modal-action modal-close waves-effect waves-green btn-flat ">x</a>
            </h5>
        </div>
        <div class="modal-body">
            <div class="col s12">
                <table class="responsive-table bordered striped Highlight">
                    <thead class="text-warning">

                    <th >ID </th>
                    <th > Item </th>
                    <th >  Product </th>
                    <th > Quantity </th>
                    <th > Price </th>
                    <th> Status </th>
                    <th> Delivery </th>



                    </thead>
                    <tbody>
                    @foreach ($records->orderProductAttribute  as $record)
                        <tr>
                            <td> {{ $record->order_id }}</td>
                            <td> {{ $record->uuid }}</td>
                            <td> {{ $record->product ? $record->product->name  : '' }}</td>
                            <td> {{ $record->quantity }}</td>
                            <td> {{ $record->price }}</td>
                            <td> {{ $record->status }}</td>
                            <td> Delivery</td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        </div>
</div>

</div>
