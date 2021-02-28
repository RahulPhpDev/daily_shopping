<tr>
    <td> {{ $record->id }} </td>
    <td> {{ $record->created_at }} </td>
    <td> {{ optional($record->product)->selling_price }} </td>
    <td> {{ optional($record->product)->buying_price }} </td>
    <td> {{ $record->quantity  }}  </td>
    @if($this->product_id)
        <td> {{ $record->product->name }} </td>
        <td> {{ $record->product->brand ? $record->product->brand ->name : '' }} </td>
        @elseif($this->brand_id ||  $this->category_id)
          <td> {{ $record->product->name }} </td>
    @else

        <td> {{ optional($record->product)->name }} </td>
        <td> {{ optional($record->brand)->name }} </td>
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
