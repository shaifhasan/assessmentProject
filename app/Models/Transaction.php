<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public $primaryKey='id';

    public $timestamps=false;
    
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class,'user_id','id');
    }

    public function scopeUserTransaction($query,$id)
    {
        return $query->where('user_id',$id);
    }

    public function scopeUserDeposit($query,$id)
    {
        return $query->where('user_id',$id)
                    ->where('transaction_type','deposit');
    }

    public function scopeUserWithdrawal($query,$id)
    {
        return $query->where('user_id',$id)
                    ->where('transaction_type','withdrawal');
    }

    public function scopeWithdrawalMonth($query,$id,$month)
    {
        return $query->where('user_id',$id)
                     ->where('transaction_type','withdrawal')
                     ->whereMonth('date',$month)
                     ->sum('amount');
    }

    public function scopeWithdrawalTotal($query,$id)
    {
        return $query->where('user_id',$id)
                     ->where('transaction_type','withdrawal')
                     ->sum('amount');
    }
}
