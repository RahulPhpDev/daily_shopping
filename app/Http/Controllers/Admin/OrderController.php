<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $records = Order::with('user','orderProductAttribute')->paginate(10);
     return view('admin.orders.index', [
         'records' => $records
     ]);
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param $orderId
     * @return View
     */
    public function items($orderId) : View
    {
        $records = Order::with('orderProductAttribute', 'orderProductAttribute.product', 'orderProductAttribute.orderAttributeDelivery', 'orderProductAttribute.productAttribute')->find($orderId);
        dd($records->orderProductAttribute->toArray());
        return view('admin.orders.order-items', compact('records'));
    }
}
