<?php

namespace App\Http\Controllers;

use View;
use Log;

use Illuminate\Http\Request;
use App\Models\Products; 

class RegistrationController extends Controller
{
    public function view()
    {
        $products = Product::all();
        $data = compact('products');
        return view('Home')->with($data);
    }
}
