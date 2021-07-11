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
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $records = Product::with('brand','unit' , 'category','image')
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
        $unites = Unit::pluck('name', 'id')->prepend('', 'Select Unit');
        $categories = Category::pluck('name', 'id')->prepend(' ', 'Select Category');
        return view ('admin.product.form.add-more-product', compact('brands', 'unites', 'categories', 'num'));
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
            $rec = $request->only(
                array_keys($request->productValidation()
                )) ;
            for ($i = 0; $i < $rec['count_times']; $i++)
            {
               $data = [
                    'name' =>  $rec['name']['*'][$i],
                    'unit_id' =>  $rec['unit_id']['*'][$i],
                    'category_id' =>  $rec['category_id']['*'][$i],
                    'brand_id' => $rec['brand_id']['*'][$i],
                    'name' => $rec['name']['*'][$i],
                    'buying_price' => $rec['buying_price']['*'][$i],
                    'selling_price' => $rec['selling_price']['*'][$i],
                    'is_popular' => isset($rec['is_popular']['*'][$i])  ? $rec['is_popular']['*'][$i] || false : false,
                ];
               $product = Product::create($data);
               $newC = $i + 1;
                if ($request->hasFile("product_image")
                    && $request->file('product_image.'.$newC)->isValid()
                ) {
                        $validated = $request->validate([
                            "product_image.$newC" => 'mimes:jpeg,png,jpg|max:4014',
                        ]);
                        $productImage = $request->product_image[$newC];
                        $extension = $productImage->extension();
                        $fullFileName = $productImage->getClientOriginalName().'_'.$product->id.".".$extension;

                        $productImage
                            ->storeAs("/public/product/$product->id/",$fullFileName);
                        $url = Storage::url("product/$product->id/".$fullFileName);
                        $product->image()->create([
                            'src' => $url
                        ]);

                }

                $product->inventory()->save(
                    new Inventory(
                        [
                            'quantity' => $rec['quantity']['*'][$i],
                        ]
                    )
                );
            }
            DB::commit();
            return redirect()->route('admin.product.index');
        } catch ( Exception $exception)
        {
            DB::rollBack();
//            dd($exception);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
       $product = Product::find($id);
       $product->delete();
       return redirect()->route('admin.product.index');
    }

}
