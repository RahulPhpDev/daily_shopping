<?php

namespace App\Http\Livewire\Admin;

use App\Enums\PaginationEnum;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use App\Models\Inventory as InventoryModel;

class Inventory extends Component
{
    use WithPagination;
   protected $paginationTheme = 'bootstrap';

   public $brand_id,$product_id, $category_id, $attribute_id;
   public $request;

  public $fields = [
          'id',
          'Added Date',
          'Selling Price',
          'Buying Price',
          'Inventory', // quantity
      ];

   public function mount(  )
   {
       $this->product_id = request('product_id');
       $this->brand_id = request('brand_id');
       $this->category_id = request('category_id');
       $this->attribute_id = request('attribute_id');
       if ( $this->brand_id ||  $this->category_id) {
           array_push($this->fields, 'Product');
       }
       else if ( $this->product_id ) {
           array_push($this->fields, 'Brand');
       }
       else {
           array_push($this->fields, 'Product', 'Brand');
       }

   }


    public function render()
    {

        $records = InventoryModel::when($this->product_id, function ($query) {
            $query
                ->with('productAttribute.product.brand')
                ->with('productAttribute.product')
                ->whereHas('productAttribute.product' ,
                    function( $subQuery) {
                        $subQuery->where('id', $this->product_id);
            }  );
        })
        ->paginate(PaginationEnum::Show10Records);
//        dd($records);
        return view('livewire.admin.inventory.index', [
            'records' =>$records,
            'fields'  => $this->fields
        //array_push($this->fields, 'Action')
        ]
        );
    }
}
