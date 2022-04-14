<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\SupplierRefund;
use Illuminate\Support\Facades\Session;
use App\Models\SupplierInvoice;
class SupplierRefundController extends Controller
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
    public function supplierRefund($supplierId)
    {
        $data['supplier'] = Supplier::FindOrFail($supplierId);
        $data['refunds'] = SupplierRefund::all();
        return view('suppliers.refund.index',$data);
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
            'amount' => 'required',
            'date' => 'required',
        ]);
        $formData = $request->all();
        $formData['supplier_id'] = $supplierId;

        if(SupplierRefund::create($formData)){
            Session::flash('message',' Refund Added successfully! ');
        }else{
            Session::flash('error','Something Wrong!');
        }

        return redirect()->route('supplierRefund.show',$supplierId);
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
        if(SupplierRefund::FindOrFail($id)->delete()){
            Session::flash('message',' Payment Deleted ');
        }else{
            Session::flash('error','Something Wrong!');
        }
        return redirect()->back();
    }
}
