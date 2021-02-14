<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->user->name }} </td>
    <td> {{ $record->user->phone }} </td>
    <td> {{ $record->uuid }} </td>
    <td>
        <button
            class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3"
            href="#createModal"
            onClick = "showAttribute({{$record->id}})" type="button" >
            {{ $record->orderProductAttribute->count() }}
        </button>
         </td>
    <td> {{$record->order_status }}</td>
    <td> {{  $record->created_at }} </td>

</tr>



<div  id="createModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
     aria-hidden="true">
    <div id = "order_items">

    </div>
</div>
