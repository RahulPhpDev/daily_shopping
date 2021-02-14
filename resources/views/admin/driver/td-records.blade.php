<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->name }} </td>
    <td>
        <a class="text-success" style ="color:red" href = {{route('admin.driver.location.create', $record->id)}}>
            {{ $record->vehicle_count }}
        </a>
    </td>
</tr>
