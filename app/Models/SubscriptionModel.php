<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionModel extends Model
{
    use HasFactory;
    protected $table = 'subscription';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function subscriptionHistories()
        {
            return $this->hasMany(SubscriptionHistoryModel::class, 'subscription_id');
        }
}
