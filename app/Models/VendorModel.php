<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorShopModel extends Model
{
    use HasFactory;
    protected $table = 'vendor_shop';
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = 'vendor_id';
}
