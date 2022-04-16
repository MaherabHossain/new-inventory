<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerInvoice;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CustomerPayment;
use App\Models\CustomerInvoiceItem;
use Illuminate\Support\Facades\Session;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return view('customers.invoice.index');
    // }

    public function customerInvoice($customerId){
        $data['customer'] = Customer::FindOrFail($customerId);
        return view('customers.invoice.index',$data);  
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
    public function store(Request $request,$customerId)
    {
        $validated = $request->validate([
            'date' => 'required',
        ]);
        $formData = $request->all();
        $formData['customer_id'] = $customerId;
        if(CustomerInvoice::create($formData)){
            Session::flash('message','Customer Invoice Created Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        } 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoiceId,$customerId)
    {
        $data['total_pay'] = CustomerPayment::where('customer_invoice_id',$invoiceId)->sum('amount');
        $data['products'] = Product::all();
        $data['customer'] = Customer::FindOrFail($customerId);
         $data['customer']['invoice_item'] = CustomerInvoiceItem::where('customer_invoice_id',$invoiceId)->get();
        $data['invoice'] = CustomerInvoice::FindOrFail($invoiceId);
        return view('customers.invoice.details',$data);
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
    public function destroy($invoiceId,$customerId)
    {
        if(CustomerInvoice::findOrFail($invoiceId)->delete()){
            Session::flash('message','Invoice Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->route('customerInvoice.show',$customerId);
    }
}
