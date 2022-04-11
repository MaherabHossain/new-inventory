<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['brands'] = Brand::all();
        return view('products.brand.brand',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'brand_name' => 'required',
        ]);
        if(Brand::create($request->all())){
            Session::flash('message','Brand Added Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->to('brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['brand'] = Brand::FindOrFail($id);

        return view('products.brand.editBrand',$data);
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
            'brand_name' => 'required',
        ]);
        $brand = Brand::FindOrFail($id);

        $formData = $request->all();

        $brand->brand_name = $formData['brand_name'];

        if($brand->save()){
            Session::flash('message','Brand Updated Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->to('brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Brand::findOrFail($id)->delete()){
            Session::flash('message','Brand Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->to('brand');
    }
}
