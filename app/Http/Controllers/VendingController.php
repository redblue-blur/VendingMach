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
    public function select(Request $request)
    {
        Log::info("inside input");
        Log::info($request);
        $id=$request["id"];
        $id=$request["id"];
        $id=$request["id"];
        $email = Email::where('email', $request["emailcheck"])->first();
        // $email = DB::table('email')->where('email', $request['emailcheck'])->first();

        $x=json_decode(json_encode($email), true);
        Log::info($x);
        // $data=compact('title','email');
        $data=array($title, $email);
        return view('input')->with('data',$data);
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
