<?php

namespace App\Modules\Dashboard\Controllers\Backend;

use App\Modules\User\Models\User;
use App\Modules\Product\Models\Product;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $data['totalUsers'] = User::count();
        $data['totalProduct'] = Product::count();
        return view("Dashboard::backend.index",$data);
    }
}
