<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->name }} </td>
    <td> {{ $record->email }} </td>
    <td> {{ $record->phone }} </td>
    <td> {{$record -> roles->first()->name}} </td>
    <td>

        <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3"
           wire:click="edit({{ $record->id }})"
           href="#editModal">Edit</a>

        <button  class="waves-effect waves-light btn gradient-45deg-light-warning-cyan z-depth-4" wire:click="delete({{ $record->id }})">
            Delete
        </button>
    </td>
</tr>
