<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login.page')->with('error-unauthorized', 'Silahkan login terlebih dahulu!');
        }
        $productCount = Product::count();
        $categoryCount = Category::count();
        
        return view('pages.dashboard.admin', compact('productCount', 'categoryCount'));
    }
}
