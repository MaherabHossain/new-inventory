<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\SupplierInvoice;
use App\Models\SupplierInvoiceItem;
class SupplierInvoiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$invoiceId,$supplierId)
    {
        $validated = $request->validate([
            'product' => 'required',
            'quantity' => 'required',
            'unit_price' => 'required'
        ]);
        $formData = $request->all();
        $product_info = json_decode($formData['product'], true);
        $formData['product_id'] =  $product_info['id'];
        $formData['product_name'] =  $product_info['name'];
        $formData['supplier_invoice_id'] = $invoiceId;
        $formData['status'] = '0';
        $formData['supplier_id'] = $supplierId;
        if(SupplierInvoiceItem::create($formData)){
            Session::flash('message',' Product added');
        }else{
            Session::flash('error','Something Wrong!');
        }
        return redirect()->back();   

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(SupplierInvoiceItem::findOrFail($id)->delete()){
            Session::flash('message','Product Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->back();
    }
}
