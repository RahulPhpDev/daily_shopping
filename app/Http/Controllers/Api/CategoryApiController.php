<?php

namespace App\Http\Controllers\Api;

use App\Enums\PaginationEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CategoryResource;
use App\Models\Category;
use App\Http\Resources\Api\CategoryCollection;

class CategoryApiController extends Controller
{
  public  function index()
  {
//      return CategoryResource::collection(Category::paginate(5)); // this gives the single resource collection
      // can not access the additional property


      return new CategoryCollection(Category::paginate(PaginationEnum::Show10Records));
//      return $category;
  }

}
