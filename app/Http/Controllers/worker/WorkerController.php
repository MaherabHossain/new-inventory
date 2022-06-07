<?php

namespace App\Http\Controllers\worker;
use App\Http\Controllers\Controller;
use App\Models\Worker;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::latest()->paginate(5);
    
        return view('worker.index',compact('workers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payments = Payment::latest()->get();
        return view('worker.createWorker', compact('payments'));
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
            'q_id' => 'required',
            'q_id_Exp' => 'required',
            'q_id_img' => 'required',
            'pp' => 'required',
            'pp_exp' => 'required',
            'pp_img' => 'required',
            'user_img' => 'required',
            'service' => 'required',
            'amount' => 'required',
        ]);

        $validatedData = $request->validate([
            'q_id_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'pp_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'user_img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
           ]);

        $worker = new Worker;
           $worker->payment_id = $request->input('payment_id');
           $worker->name = $request->input('name');
           $worker->q_id = $request->input('q_id');
           $worker->q_id_Exp = $request->input('q_id_Exp');
           $worker->pp = $request->input('pp');
           $worker->pp_exp = $request->input('pp_exp');
           
           if ($request->hasfile('q_id_img')) {
               $file = $request->file('q_id_img');
               $extention =  $file->getClientOriginalExtension();
               $QIDimage = time().'.'.$extention;  
               $file->move(('worker/QidImg/'), $QIDimage); 
               $worker->q_id_img = $QIDimage;
       
           } 
           if ($request->hasfile('pp_img')) {
            $file = $request->file('pp_img');
            $extention =  $file->getClientOriginalExtension();
            $PPimage = time().'.'.$extention;  
            $file->move(('worker/PPimg/'), $PPimage); 
            $worker->pp_img = $PPimage;
    
        } 
        if ($request->hasfile('user_img')) {
            $file = $request->file('user_img');
            $extention =  $file->getClientOriginalExtension();
            $userimage = time().'.'.$extention;  
            $file->move(('worker/userImg/'), $userimage); 
            $worker->user_img = $userimage;
    
        } 
        
        $worker->service = $request->input('service');
        $worker->amount = $request->input('amount');
        $worker->remark = $request->input('remark');
        $worker->save();
     
        return redirect()->route('workers.index')
                        ->with('success','Worker created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        return view('worker.detailsWorker',compact('worker'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        $payments = Payment::latest()->get();
        return view('worker.editWorker',compact('worker','payments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */  
    public function update(Request $request, Worker $worker)
    {
        
           $worker->payment_id = $request->input('payment_id');
           $worker->name = $request->input('name');
           $worker->q_id = $request->input('q_id');
           $worker->q_id_Exp = $request->input('q_id_Exp');
           $worker->pp = $request->input('pp');
           $worker->pp_exp = $request->input('pp_exp');
           
           if ($request->hasfile('q_id_img')) {
               $destination = 'worker/QidImg/'. $worker->q_id_img;
               if (File::exists($destination)) {
                    File::delete($destination);
               }
               $file = $request->file('q_id_img');
               $extention =  $file->getClientOriginalExtension();
               $QIDimage = time().'.'.$extention;  
               $file->move(('worker/QidImg/'), $QIDimage); 
               $worker->q_id_img = $QIDimage;
           } 
           if ($request->hasfile('pp_img')) {
            $destination = 'worker/PPimg/'. $worker->pp_img;
            if (File::exists($destination)) {
                 File::delete($destination);
            }
            $file = $request->file('pp_img');
            $extention =  $file->getClientOriginalExtension();
            $PPimage = time().'.'.$extention;  
            $file->move(('worker/PPimg/'), $PPimage); 
            $worker->pp_img = $PPimage;
        } 
        if ($request->hasfile('user_img')) {
            $destination = 'worker/userImg/'. $worker->user_img;
            if (File::exists($destination)) {
                 File::delete($destination);
            }
            $file = $request->file('user_img');
            $extention =  $file->getClientOriginalExtension();
            $userimage = time().'.'.$extention;  
            $file->move(('worker/userImg/'), $userimage); 
            $worker->user_img = $userimage;
        } 
        $worker->service = $request->input('service');
        $worker->amount = $request->input('amount');
        $worker->remark = $request->input('remark');
        $worker->update();
     
        return redirect()->route('workers.index')
                        ->with('success','Worker Updated successfully.');
    
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Worker $worker)
    {
               $destination = 'worker/QidImg/'. $worker->q_id_img;
               if (File::exists($destination)) {
                    File::delete($destination);
               }
               $destination = 'worker/PPimg/'. $worker->pp_img;
               if (File::exists($destination)) {
                    File::delete($destination);
               }
               $destination = 'worker/userImg/'. $worker->user_img;
                if (File::exists($destination)) {
                 File::delete($destination);
               }
            $worker->delete();
    
        return redirect()->route('workers.index')
                        ->with('success','Worker deleted successfully');
    }
}
