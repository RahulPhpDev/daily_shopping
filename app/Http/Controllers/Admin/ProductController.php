<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PaginationEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $records = Product::with('brand','unit' , 'category')
                            ->paginate(PaginationEnum::Show10Records);
        return view('admin/product/index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $brands = Brand::pluck('name', 'id')->prepend('', 'Select Brand');
        $unites = Unit::pluck('name', 'id')->prepend('', 'Select Unit');
        $categories = Category::pluck('name', 'id')->prepend(' ', 'Select Category');
        return view('admin/product/create', compact('brands', 'unites', 'categories'));
    }


    public function addMoreAttribute($num)
    {
        $brands = Brand::pluck('name', 'id')->prepend('', 'Select Brand');
        return view ('admin.product.form.add-more-attribute', compact('brands', 'num'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        DB::beginTransaction();

        try {
            $product = Product::create(
                $request->only(
                    array_keys($request->productValidation()
                    ))
            );
            $rec = $request->only(
                array_keys($request->attributeValidation()
                )) ;
          for ($i = 0; $i < count($rec['brand_id']);$i++)
          {

              $attribute =  $product->attributes()->save(
                  new ProductAttribute([
                      'brand_id' => $rec['brand_id']['*'][$i],
                      'attribute_name' => $rec['attribute']['*'][$i],
//                 'quantity' => $rec['quantity']['*'][$i],
                      'buying_price' => $rec['buying_price']['*'][$i],
                      'selling_price' => $rec['selling_price']['*'][$i],
                  ])
              );

              $attribute->inventory()->save(
                  new Inventory(
                      [
                          'quantity' => $rec['quantity']['*'][$i],
                      ]
                  )
              );
          }
//            dd( $rec[0]);


            DB::commit();
            dd('test');
        } catch ( Exception $exception)
        {
            DB::rollBack();
            dd($exception);
        }
        dump($_POST, array_keys($request->productValidation()));
    dd($request->all(), $request->input('brand_id'));



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        return view('admin/product/index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
