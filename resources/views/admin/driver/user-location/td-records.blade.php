<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->state }} -
        {{ $record->city }} -
        {{ $record->code }} -
        {{ $record->landmark }}
    </td>
{{--    <td>--}}
{{--        <a class="text-success" href = {{route('admin.driver.location.create', $record->id)}}>--}}
{{--         Delete--}}
{{--        </a>--}}
{{--    </td>--}}
</tr>
