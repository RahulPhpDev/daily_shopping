<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementApiController extends Controller
{
    public function index()
    {
        return response( Advertisement::all());

    }
}
