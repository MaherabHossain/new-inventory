<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] = Brand::all();
        $data['products'] = Product::all();
        return view('products.product',$data);
    }

    /**
     * Show the form for creating a new resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'product create      ';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => 'required',
            'product_name' => 'required',
        ]);
        if(Product::create($request->all())){
            Session::flash('message','Product Added Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }    
        return redirect()->to('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] = Product::FindOrFail($id);
        return view('products.singleProduct',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::FindOrFail($id);

        return view('products.editProduct',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required',
        ]);

        $product = Product::FindOrFail($id);
        $formData = $request->all();
        $product->product_name = $formData['product_name'];
        $product->description = $formData['description'];
        if($product->save()){
            Session::flash('message','Product Updated Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }    
        return redirect()->to('product');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Product::findOrFail($id)->delete()){
            Session::flash('message','Product Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->to('product');
    }
}
