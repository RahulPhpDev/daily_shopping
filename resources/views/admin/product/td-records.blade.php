<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->name }} </td>
    <td> {{ $record->category->name }} </td>
    <td> {{ $record->unit->name }} </td>
    <td>
        <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3 btn-small-custom"

            href="{{ route('admin.inventory','?product_id='.$record->id) }}">Inventory</a>
    </td>
    <td>

        <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3"
           wire:click="edit({{ $record->id }})"
           href="#editModal">Edit</a>

        <button  class="waves-effect waves-light btn gradient-45deg-light-warning-cyan z-depth-4" wire:click="delete({{ $record->id }})">
            Delete
        </button>
    </td>
</tr>
