<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'review';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = [
        'description',
        'rating_point',
        'status',
        'product_id',
        'vendor_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
