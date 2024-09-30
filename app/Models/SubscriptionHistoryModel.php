<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionHistoryModel extends Model
{
    use HasFactory;
    protected $table = 'subscription_history';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'vendor_id',
        'subscription_id',
        'price',
        'days',
        'status',
        'start_date',
        'end_date'
    ];
    public function subscription()
    {
        return $this->belongsTo(SubscriptionModel::class, 'subscription_id');
    }
}
