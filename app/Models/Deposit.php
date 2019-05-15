<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = 'deposits';

    protected $fillable = [
    	'user_id',
    	'bank_id',
        'type_security_deposit',
        'amount'
	];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function bank_account(){
        return $this->belongsTo('App\BankAccount');
    }
}
