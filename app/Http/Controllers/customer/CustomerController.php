<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerInvoiceItem;
use App\Models\CustomerPayment;
use App\Models\CustomerRefund;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data['customers'] = Customer::all();
    
        return view('customers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.createCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
    
        Customer::create($request->all());
     
        return redirect()->route('customers.index')
                        ->with('success','Custommer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['customer'] = Customer::FindOrFail($id);
        $invoice_items = CustomerInvoiceItem::where('customer_id',$id)->get();
        $data['total_payment'] = CustomerPayment::where('customer_id',$id)->sum('amount');
        $data['total_refund'] = CustomerRefund::where('customer_id',$id)->sum('amount');
        $total_purchase = 0;
        foreach ($invoice_items as $invoice_item) {
           $total_purchase += $invoice_item->quantity * $invoice_item->unit_price;
        }
        $data['total_purchase'] = $total_purchase;
        return view('customers.detailsCustomer',$data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.editCustomer',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
    
        $customer->update($request->all());
    
        return redirect()->route('customers.index')
                        ->with('success','Customer Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
    
        return redirect()->route('customers.index')
                        ->with('success','Customer deleted successfully');
    }
}
