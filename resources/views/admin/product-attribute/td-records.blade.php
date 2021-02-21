<tr>
    <td> {{$record->id}} </td>
    <td> {{$record->attribute_name}} </td>
    <td> {{$record->brand->name}} </td>
    <td> {{$record->buying_price }} </td>
    <td> {{$record->selling_price }} </td>
    <td> {{$record->inventory->sum('quantity') }} </td>
    <td> <img src="{{ optional($record->image->first() )->src  }} " height="100" width="120"/></td>
    <td>

        {{--        <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3"--}}
            {{--           wire:click="edit({{ $record->id }})"--}}
            {{--           href="#editModal">Edit</a>--}}
        <form className="display-inline" method="POST" action={{route('admin.attribute.destroy', [$record->id]  )}}>
            @csrf
            @method('delete')
            <button type="submit" className=" waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3">
                Delete
            </button>
        </form>

    </td>
</tr>
