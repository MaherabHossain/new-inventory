<?php

namespace App\Http\Controllers\worker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaidController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::latest()->paginate(5);
    
        return view('worker.payment.index',compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('worker.payment.createPayment');
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
            'paid' => 'required',
            'trans_id' => 'required',
        ]);
        Payment::create($request->all());
     
        return redirect()->route('payments.index')
                        ->with('success','Payment Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        return view('worker.payment.detailsPayment',compact('payment'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('worker.payment.editPayment',compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */  
    public function update(Request $request, Payment $payment)
    {
        
        $request->validate([
            'name' => 'required',
            'paid' => 'required',
            'trans_id' => 'required',
        ]);
    
        $payment->update($request->all());
    
        return redirect()->route('payments.index')
                        ->with('success','Payment Data updated successfully');
    
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
    
        return redirect()->route('payments.index')
                        ->with('success','Payment deleted successfully');
    }
}
