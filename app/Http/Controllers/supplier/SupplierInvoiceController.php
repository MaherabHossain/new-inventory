<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;
use App\Models\SupplierInvoice;
use App\Models\SupplierInvoiceItem;
use App\Models\Product;
use App\Models\SupplierPayment;
class SupplierInvoiceController extends Controller
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
    public function supplierInvoice($supplierId)
    {
        $data['supplier'] = Supplier::FindOrFail($supplierId);

        return view('suppliers.invoice.index',$data);
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
    public function store(Request $request,$supplierId)
    {
        $validated = $request->validate([
            'date' => 'required',
        ]);
        $formData = $request->all();
        $formData['supplier_id'] = $supplierId;
        if(SupplierInvoice::create($formData)){
            Session::flash('message','Supplier Invoice Created Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        } 
        return redirect()->to('supplier/invoice/'.$supplierId.'/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($invoiceId,$supplierId)
    {
        $data['total_pay'] = SupplierPayment::where('supplier_invoice_id',$invoiceId)->sum('amount');
        $data['supplier'] = Supplier::FindOrFail($supplierId);
        $data['supplier']['invoice_item'] = SupplierInvoiceItem::where('supplier_invoice_id',$invoiceId)->get();
        $data['invoice'] = SupplierInvoice::FindOrFail($invoiceId);
        $data['products'] = Product::all();
        return view('suppliers.invoice.details',$data);
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
    public function destroy($invoiceId,$supplierId)
    {
        if(supplierInvoice::findOrFail($invoiceId)->delete()){
            Session::flash('message','Invoice Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->to('supplier/invoice/'.$supplierId .'/show');
    }
}
