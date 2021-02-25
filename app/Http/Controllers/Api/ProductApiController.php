<?php

namespace App\Http\Controllers\Api;

use App\Enums\PaginationEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryProductResource;
use App\Http\Resources\Api\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
  public function index()
  {
        return new ProductCollection(
                Product::with('image', 'brand','attributes')
                    ->without('category')->paginate(PaginationEnum::Show10Records)
        );
  }


  public function categoryProduct($category_id)
  {
      return  CategoryProductResource::collection(
                        Product::where('category_id', $category_id
                    )->paginate(PaginationEnum::Show10Records));
  }


}
