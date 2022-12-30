<?php

namespace App\Http\Controllers;

use View;
use Log;

use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Machine;

class VendingController extends Controller
{
    public function view()
    {
        $products = Product::all();
        $data = compact('products');
        return view('home')->with($data);
    }
    protected function select(Request $request)
    {
        $id=$request["id"];
        $coins=explode(',', $request["coins"]);
        $total=$request["total"];
        Log::info($total);
        $machine = Machine::where('id',1)->first();
        $machine = json_decode(json_encode($machine), true);
        $product = Product::where('id',$id)->first();
        $machine[0] =$machine[0]+(int)$coins[0];
        $machine[1] =$machine[1]+(int)$coins[1];
        $machine[2] =$machine[2]+(int)$coins[2];
        $machine[3] =$machine[3]+(int)$coins[3];
        $machine[4] =$machine[4]+(int)$coins[4];
        $total=(5*(int)$coins[0]+10*(int)$coins[1]+20*(int)$coins[2]+50*(int)$coins[3]+100*(int)$coins[4])-(int)$product->price;
        // $data=compact( 'id', 'coins', 'total', 'machine', 'products');
        $machine[4] =floor($machine[4]-($total)/100);
        $total=$total%100;
        $machine[3] =floor($machine[3]-($total)/100);
        $total=$total%50;
        $machine[2] =floor($machine[2]-($total)/100);
        $total=$total%20;
        $machine[1] =floor($machine[1]-($total)/100);
        $total=$total%10;
        $machine[0] =floor($machine[0]-($total)/100);
        $total=$total%5;
        Log::info($product->price);
        Log::info($machine);
        Log::info($total);
        // return view('transaction')->with('data',$data);
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
