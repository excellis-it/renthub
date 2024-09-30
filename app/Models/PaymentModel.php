<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentModel extends Model
{
    use HasFactory;
    protected $table = 'payment_history';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'card_holder',
        'card_number',
        'expiry_date',
        'cvv',
        'subscription_history_id'
    ];
}
