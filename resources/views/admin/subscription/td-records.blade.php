<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->user->name  }} </td>
    <td> {{ $record->product->name }} </td>
    <td> {{ $record->price  }} </td>
    <td> {{ $record->quantity  }} </td>
    <td> {{  $record->price *  $record->quantity }} </td>
    <td> {{ json_encode( $record->delivery ) }} </td>
    <td> {{  $record->created_at->format('d-M-Y') }} </td>
</tr>
