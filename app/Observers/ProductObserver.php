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
                $product->inventory()->delete();

                DB::commit();
            } catch (\Exception $e)
            {
                DB::rollBack();
            }
    }
}
