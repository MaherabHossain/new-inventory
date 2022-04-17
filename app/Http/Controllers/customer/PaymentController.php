<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerPayment;
use Illuminate\Support\Facades\Session;
class PaymentController extends Controller
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
    public function customerPayment($customerId){
        $data['customer'] = Customer::FindOrFail($customerId);
        return view('customers.payment.index',$data);
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
    public function store(Request $request,$customerId,$invoiceId=null)
    {
        $validated = $request->validate([
            'date' => 'required',
            'amount' => 'required',
        ]);
        $formData = $request->all();
        $formData['customer_id'] = $customerId;
        $formData['customer_invoice_id'] = $invoiceId;
        
        if(CustomerPayment::create($formData)){
            Session::flash('message','Customer Payment Added Successfully!');
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
    public function show($paymentId,$customerId)
    {
        $data['customer'] = Customer::FindOrFail($customerId);
        $data['payment'] = CustomerPayment::FindOrFail($paymentId);
        return view('customers.payment.details',$data);
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
    public function destroy($paymentId,$customerId)
    {
        if(CustomerPayment::findOrFail($paymentId)->delete()){
            Session::flash('message','Payment Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->route('customerPayment.show',$customerId);
    }
}
