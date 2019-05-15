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
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mutasi(){
        $data['total'] = Deposit::where('user_id',Auth::user()->id)->where('type_security_deposit','IN')->sum('amount')-Deposit::where('user_id',Auth::user()->id)->where('type_security_deposit','OUT')->sum('amount');
        $data['mutasi'] = Transaction::select('transactions.*',
        DB::raw('(
            CASE WHEN transactions.transaction_type = "TP" THEN "Topup"
             WHEN transactions.transaction_type = "WD" THEN "Withdraw"  ELSE "Transfer" END) AS transaction_type'),
            'users.name as user_name'
        )->join('users','transactions.user_id','users.id')
        ->get();
        return view('pages.practice_tree.mutasi.index',$data);
    }


}
