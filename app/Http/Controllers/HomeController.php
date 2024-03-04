<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function main(){
        return view('main',
        [
            'product'=>Product::get()
    ]);
    }

    public function store(Request $request){

        $request->validate([
            'name'=> 'required',
            'description'=> 'required'



        ]);






        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product Created Successfully');

    }
    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('edit',['product'=>$product]);

    }
    public function update(Request $request,$id) {


        $request->validate([
            'name'=> 'required',
            'description'=> 'required',



        ]);

        $product = Product::where('id',$id)->first();


        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();

        return back()->withSuccess('Product Updated Successfully');


    }
    public function destory($id){
        $product=Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product deleted Successfully');

    }
}
