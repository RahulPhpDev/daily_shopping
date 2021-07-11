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
//        50, 0000 => 50 mb
        $request->validate([
            'name' => 'required|max:100|min:1',
            'file' => ['file',
                        'required',
                        'mimes:jpg,bmp,png,mp4,,ogx,oga,ogv,ogg,webm',
                         'max:200000'
                    ]
        ]);
        $type = 2;
        if (false !== mb_strpos($request->file->getMimeType(), "image"))
        {
            $type = 1;
        }
        $fileNameExt = $request->file('file')->getClientOriginalName();
        $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        $extension = $request->file('file')->getClientOriginalExtension();
        $fileToStore = $fileName.'_'.time().'.'.$extension;
        $path = $request->file('file')->storeAs('public/advertisement', $fileToStore);
        Advertisement::create([
            'name' => $request->name,
            'type' => $type,
            'url' =>'advertisement/'.$fileToStore,
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
     * @param  \App\Models\Advertisement  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $id)
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
    public function update(Request $request, Advertisement $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();
        return redirect()->route('admin.advertisement.index');
    }
}
