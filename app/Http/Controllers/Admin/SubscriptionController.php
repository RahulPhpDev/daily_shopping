<?php

namespace App\Http\Controllers\Admin;

use App\Enums\PaginationEnum;
use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function index()
    {
        $records = Subscription::query('product','user')->paginate( PaginationEnum::Show10Records);
        return view('admin/subscription/index', compact('records'));
    }
}
