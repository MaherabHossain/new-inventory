<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomerPayment;
use App\Models\Customer;
use App\Models\CustomerRefund;
use Illuminate\Support\Facades\Session;

class RefundController extends Controller
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

    public function customerRefund($customerId)
    {
        $data['customer'] = Customer::Find($customerId);
        $data['refunds'] = CustomerRefund::where('customer_id',$customerId)->get();
        return view('customers.refund.index',$data);
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
            'amount' => 'required',
            'date' => 'required',
        ]);
        $formData = $request->all();
        $formData['customer_id'] = $customerId;

        if(CustomerRefund::create($formData)){
            Session::flash('message',' Refund Added successfully! ');
        }else{
            Session::flash('error','Something Wrong!');
        }

        return redirect()->route('customerRefund.show',$customerId);
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
    public function destroy($refundId,$customerId)
    {
        if(CustomerRefund::FindOrFail($refundId)->delete()){
            Session::flash('message',' Refund Deleted ');
        }else{
            Session::flash('error','Something Wrong!');
        }
        return redirect()->route('customerRefund.show',$customerId);
    }
}
