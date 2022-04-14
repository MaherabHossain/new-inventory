<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;
use App\Models\SupplierInvoice;
use App\Models\SupplierPayment;

class SupplierPaymentController extends Controller
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
    public function supplierPayment($supplierId)
    {
        $data['supplier'] = Supplier::FindOrFail($supplierId);
        $data['payments'] = SupplierPayment::all();
        return view('suppliers.payment.index',$data);
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
    public function store(Request $request,$supplierId,$invoiceId=null)
    {
        $validated = $request->validate([
            'date' => 'required',
            'amount' => 'required',
        ]);

        $formData = $request->all();

        $formData['supplier_id'] = $supplierId;
        $formData['supplier_invoice_id'] = $invoiceId;
        if(SupplierPayment::create($formData)){
            Session::flash('message',' Payment added');
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
    public function show($paymentId,$supplierId)
    {
        $data['supplier'] = Supplier::FindOrFail($supplierId);
        $data['payment'] = SupplierPayment::FindOrFail($paymentId);
        return view('suppliers.payment.details',$data);
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
        if(SupplierPayment::FindOrFail($id)->delete()){
            Session::flash('message',' Payment Deleted ');
        }else{
            Session::flash('error','Something Wrong!');
        }
        return redirect()->back(); 
    }
}
