<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->type }} </td>
    <td> {{ $record->name }} </td>

         <td> <img src="{{ optional($record)->url }} " height="100" width="120"/></td>

    <td> {{$record->created_at }} </td>
    <td> <form method="post" action="{{route('admin.advertisement.destroy', $record->id)}}">
            @csrf
            @method('delete')
            <button class="waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3" type = "submit" > Delete</button>
        </form> </td>

</tr>
