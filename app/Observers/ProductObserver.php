<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductObserver
{
    /**
     * @param Product $product
     */
    public function deleting( Product $product)
    {
            DB::beginTransaction();
            try {
                $product->attributes->each( function ( $attribute ) {
                    $attribute->inventory()->delete();
                } );

                $product->attributes()->delete();

                DB::commit();
            } catch (\Exception $e)
            {
                DB::rollBack();
            }
    }
}
