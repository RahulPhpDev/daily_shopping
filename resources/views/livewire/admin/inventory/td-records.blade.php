<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->created_at }} </td>
    <td> {{ $record->productAttribute->selling_price }} </td>
    <td> {{ $record->productAttribute->buying_price }} </td>
    <td> {{ $record->quantity  }} ( {!!  $record->productAttribute->product->unit->abbreviation  !!} ) </td>
    @if($this->product_id)
        <td> {{ $record->productAttribute->brand ? $record->productAttribute->brand ->name : '' }} </td>
        @elseif($this->brand_id ||  $this->category_id)
          <td> {{ $record->productAttribute->product->name }} </td>
    @else

        <td> {{ $record->productAttribute->product->name }} </td>
        <td> {{ $record->productAttribute->brand->name }} </td>
    @endif
{{--    <td>--}}

{{--        <a class="modal-trigger waves-effect  waves-light btn gradient-45deg-light-blue-cyan z-depth-3  mr-3"--}}
{{--           wire:click="edit({{ $record->id }})"--}}
{{--           href="#createModal">Edit</a>--}}

{{--        <button  class="waves-effect waves-light btn gradient-45deg-light-warning-cyan z-depth-4" wire:click="delete({{ $record->id }})">--}}
{{--            Delete--}}
{{--        </button>--}}
{{--    </td>--}}
</tr>
