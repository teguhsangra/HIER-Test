<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\BankAccount;
use App\Models\Transaction;
use DataTables;
use Validator;
use Redirect;
use Auth;
use DB;
use Carbon\Carbon;

class TopupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $data['bank'] = BankAccount::where('user_id',Auth::user()->id)->first();
        return view('pages.practice_tree.top_up.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bank_id' => 'required',
            'amount' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/top_up')
                        ->withErrors($validator)
                        ->withInput();
        }else{

            DB::beginTransaction();
            $deposit = new Deposit;
            $deposit->user_id = Auth::user()->id;
            $deposit->bank_id = $request['bank_id'];
            $deposit->type_security_deposit = "IN";
            $deposit->amount = $request['amount'];
            if($deposit->save()){
                $transaction = new Transaction;
                $transaction->user_id = $deposit->user_id;
                $transaction->transaction_type ="TP";
                $transaction->amount = $request['amount'];
                if($transaction->save()){
                    DB::commit();
                }else{
                    \Session::flash('error', 'You are failed in inputing your data !!!');
                    DB::rollBack();
                }

                DB::commit();
                \Session::flash('success', 'You are Topup '.''.$request['amount']);
            }else{
                DB::rollBack();
                \Session::flash('error', 'You are failed in inputing your data !!!');
            }
            return Redirect::to('home');
        }
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
        //
    }


    // public function datatables(Request $request)
    // {
    //     $location_id = $request['location_id'];

    //     if($location_id != null){

    //         $collection = Invoice::join('customers','customers.id','invoices.customer_id')
    //         ->join('locations','locations.id','invoices.location_id')
    //         ->select('invoices.*','customers.name as customer_name',
    //             'customers.tax_number as customer_tax_number',
    //             'locations.name as location_name')
    //         ->where('due_date','>=',Carbon::now()->format('Y-m-d'))
    //         ->where('payment_status','NP')
    //         ->where('location_id',$location_id)
    //         ->get();


    //     }else{

    //         $collection = Invoice::join('customers','customers.id','invoices.customer_id')
    //         ->join('locations','locations.id','invoices.location_id')
    //         ->select('invoices.*','customers.name as customer_name',
    //             'customers.tax_number as customer_tax_number',
    //             'locations.name as location_name')
    //         ->where('due_date','>=',Carbon::now()->format('Y-m-d'))
    //         ->where('payment_status','NP')
    //         ->get();


    //     }


    //     return DataTables::of($collection)
    //     ->editColumn('total_price', function ($data) {
    //         return number_format($data->total_price,0,',','.');
    //     })
    //     ->editColumn('total_tax_price', function ($data) {
    //         return number_format($data->total_tax_price,0,',','.');
    //     })
    //     ->make(true);
    // }

}
