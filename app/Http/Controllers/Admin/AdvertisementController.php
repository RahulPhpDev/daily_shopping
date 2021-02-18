<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PaginationEnum;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $records = Advertisement::paginate(PaginationEnum::Show10Records);
       return view('admin.advertisement.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  View
     */
    public function create() :View
    {
      return view('admin.advertisement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'file' => ['required']
//        ]);
        $fileNameExt = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileToStore = $fileName.'_'.time().'.'.$extension;
        $path = $request->file('file')->storeAs('public/advertisement', $fileToStore);
        Advertisement::create([
            'type' => 1,
            'url' =>'public/advertisement/'.$fileToStore,
        ]);
        return redirect()->route('admin.advertisement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function show(odel $odel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function edit(odel $odel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, odel $odel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function destroy(odel $odel)
    {
        //
    }
}
