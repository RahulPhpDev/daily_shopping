<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->state }} </td>
    <td> {{ $record->city }} </td>
    <td> {{ $record->code }} </td>
    <td> {{ $record->landmark }} </td>
    <td>

        <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3"
           wire:click="edit({{ $record->id }})"
           href="#createModal">Edit</a>

        <button  class="waves-effect waves-light btn gradient-45deg-light-warning-cyan z-depth-4" wire:click="delete({{ $record->id }})">
            Delete
        </button>
    </td>
</tr>
