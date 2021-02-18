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
            <div class="col s12 mb-10 mb-10">
                <table class="responsive-table bordered striped Highlight">
                    <thead class="text-warning">

                    <th >ID </th>
                    <th > Item </th>
                    <th >  Product </th>
                    <th > Quantity </th>
                    <th > Price </th>
                    <th> Status </th>
                    <th> Assign Driver </th>



                    </thead>
                    <tbody>
                    @foreach ($records->orderProductAttribute  as $record)
                        <tr>
                            <td> {{ $record->id }}</td>
                            <td> {{ $record->uuid }}</td>
                            <td> {{ $record->product ? $record->product->name  : '' }}</td>
                            <td> {{ $record->quantity }}</td>
                            <td> {{ $record->price }}</td>
                            <td> {{ $record->product_attribute_status }}</td>
                            <td>

                                <select class="browser-default" id = "driver_opt_{{$record->id}}">
                                    @foreach( $drivers as $key => $value)
                                        <option value = {{$key}}> {{$value}} </option>
                                    @endforeach
                                </select>
                                <button type = "button" onclick= "assignDriver({{$record->id}}, {{$record->order_id}})"> Assign</button>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>

        </div>
</div>

</div>
