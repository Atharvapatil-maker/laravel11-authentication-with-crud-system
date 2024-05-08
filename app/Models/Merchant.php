<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $primaryKey = 'transaction_id';
    protected $table = 'merchants';

    protected $fillable = [

        'transaction_id',
        'merchant_txn_id',
        'date',
        'payment_method',
        'amount',
        'order_id',
        'bank_ref_no',
        'status',
        'member_details',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
