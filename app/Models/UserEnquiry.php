<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEnquiry extends Model
{
    use HasFactory;

    // product relation
    public function product()
    {
        return $this->belongsTo(product\ProductModel::class, 'product_id');
    }
}
