<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerInvoice;
use App\Models\CustomerInvoiceItem;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;

class CustomerInvoiceItemController extends Controller
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
    public function store(Request $request,$invoiceId,$customerId)
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
        $formData['customer_invoice_id'] = $invoiceId;
        $formData['status'] = '0';
        $formData['customer_id'] = $customerId;
        if(CustomerInvoiceItem::create($formData)){
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
    public function destroy($itemId,$customerId)
    {
        if(CustomerInvoiceItem::findOrFail($itemId)->delete()){
            Session::flash('message','Product Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->back();
    }
}
