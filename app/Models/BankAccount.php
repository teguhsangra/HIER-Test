<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_accounts';

    protected $fillable = [
    	'user_id',
    	'account_no',
    	'bank_name'
	];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
