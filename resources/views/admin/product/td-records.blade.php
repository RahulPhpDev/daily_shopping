<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->name }} </td>
    <td> {{ $record->category->name }} </td>
    <td> <img src="{{ optional($record->image->first() )->src  }} " height="100" width="120"/></td>
    <td> {{ $record->unit->name }} </td>
    <td>
        <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3 btn-small-custom"

            href="{{ route('admin.inventory','?product_id='.$record->id) }}">Inventory</a>
    </td>
    <td>
        <a class="modal-trigger btn-small-custom waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3 btn-small-custom"

           href="{{ route('admin.attribute.index',[$record->id] ) }}"> Attribute [{!! $record->attributes_count !!}]</a>
    </td>
    <td>

           <form class="display-inline" method="POST" action = {{route('admin.product.destroy',[ $record->id ]  )}}>
               @csrf
               @method('delete')
               <button type = "submit" class="waves-effect waves-light btn gradient-45deg-light-warning-cyan z-depth-4" >
                   Delete
               </button>
           </form>

    </td>
</tr>
