<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
    	'user_id',
    	'account_no',
        'transaction_type',
        'amount'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
