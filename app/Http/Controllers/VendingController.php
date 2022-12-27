<?php

namespace App\Http\Controllers;

use View;
use Log;

use Illuminate\Http\Request;
use App\Models\Product; 

class VendingController extends Controller
{
    public function view()
    {
        $products = Product::all();
        $product=new Product;
        $data = compact('products','product');
        return view('home')->with($data);
    }
    public function select($id)
    {
        $product = Product::find($id);
        $data = compact('product');
        return redirect('customer/view');
    }
    public function dashboardview()
    {
        $products = Product::all();
        $product=new Product;
        $data = compact('products','product');
        return view('ome')->with($data);
    }
    public function login()
    {
        return view('login');
    }
    public function logincheck()
    {
        return view('login');
    }
}
