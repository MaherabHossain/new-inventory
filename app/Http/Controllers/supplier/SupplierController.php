<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierInvoiceItem;
use App\Models\SupplierPayment;
use App\Models\SupplierRefund;
use Illuminate\Support\Facades\Session;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['suppliers'] = Supplier::all();
        return view('suppliers.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.createSupplier');
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
            'name' => 'required',
            'phone' => 'required',
        ]);
        if(Supplier::create($request->all())){
            Session::flash('message','Supplier Added Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }    
        return redirect()->to('supplier');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['supplier'] = Supplier::FindOrFail($id);
        $invoice_items = SupplierInvoiceItem::where('supplier_id',$id)->get();
        $data['total_payment'] = SupplierPayment::where('supplier_id',$id)->sum('amount');
        $data['total_refund'] = SupplierRefund::where('supplier_id',$id)->sum('amount');
        $total_purchase = 0;
        foreach ($invoice_items as $invoice_item) {
           $total_purchase += $invoice_item->quantity * $invoice_item->unit_price;
        }
        $data['total_purchase'] = $total_purchase;  

        return view('suppliers.detailsSupplier',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['supplier'] = Supplier::FindOrFail($id);
        return view('suppliers.editSupplier',$data);
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
            'name' => 'required',
            'phone' => 'required',
        ]);
        $formData = $request->all();
       $supplier = Supplier::FindOrFail($id);
       $supplier->name = $formData['name'];
       $supplier->email = $formData['email'];
       $supplier->phone = $formData['phone'];

       if($supplier->save()){
        Session::flash('message','Supplier Info Updated Successfully!');
    }else{
        Session::flash('error','Something wrong!');
    }    
    return redirect()->to('supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Supplier::findOrFail($id)->delete()){
            Session::flash('message','Supplier Deleted Successfully!');
        }else{
            Session::flash('error','Something wrong!');
        }
        return redirect()->to('supplier');
    }
}
