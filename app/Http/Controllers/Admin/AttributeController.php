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
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use App\Http\Requests\Admin\ProductAttributeRequest;
use Illuminate\Support\Facades\Storage;

class AttributeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param int $product_id
     * @return View
     */
    public function index(int $product_id) :View
    {

       $records = ProductAttribute::
                with('brand','inventory', 'product', 'image')
                ->where('product_id', $product_id)
                ->paginate(PaginationEnum::Show10Records);
       $product = Product::select('id', 'name')->findOrFail($product_id);
      return view('admin.product-attribute.index', compact('records', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $product_id
     * @return  View
     */
    public function create( int $product_id) :View
    {
        $product = Product::select('id', 'name')->findOrFail($product_id);
        $brands = Brand::pluck('name', 'id')->prepend('', 'Select Brand');
        return view('admin.product-attribute.create', compact('brands','product','product_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAttributeRequest $request, int $product_id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($product_id);
            for ($i =1; $i <= $request['count_times']; $i++) {

                $attribute = $product->attributes()->save(
                    new ProductAttribute([
                        'brand_id' => $request['brand_id'][$i],
                        'attribute_name' => $request['attribute'][$i],
                        'buying_price' => $request['buying_price'][$i],
                        'selling_price' => $request['selling_price'][$i],
                    ])
                );
                if ($request->hasFile("attribute_image.".$i)) {
                    //  Let's do everything here
                    if ($request->file('attribute_image.'.$i)->isValid()) {
                        $validated = $request->validate([
                            "attribute_image.$i" => 'mimes:jpeg,png|max:4014',
                        ]);
                        $productAttributeImage = $request->attribute_image[$i];
                        $extension = $productAttributeImage->extension();
                        $fullFileName = $productAttributeImage->getClientOriginalName().'_'.$attribute->id.".".$extension;

                        $productAttributeImage
                            ->storeAs("/public/product/$product_id/",$fullFileName);
                        $url = Storage::url("product/$product_id/".$fullFileName);
                        $attribute->image()->create([
                            'src' => $url
                        ]);
                    }
                }


                $attribute->inventory()->save(
                    new Inventory(
                        [
                            'quantity' => $request['quantity'][$i],
                        ]
                    )
                );
            }
            DB::commit();
            return redirect()->route('admin.attribute.index', [$product_id]);
        }catch ( Exception $exception)
        {
            DB::rollBack();
        }
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        ProductAttribute::destroy($id);
        Session::flash('success','attribute deleted');
        return redirect()->route('admin.product.index');
    }

}
