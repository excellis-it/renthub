<?php

namespace App\Models\product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\User;

class ProductModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag_line',
        'product_name',
        'location',
        'product_short_description',
        'product_long_description',
        'vehicle_km',
        'manufacture_date',
        'marked_price',
        'property_size',
        'property_bed',
        'property_bathroom',
        'product_price',
        'brand_id',
        'product_type',
        'vendor_type',
        'is_available',
        'product_status',
        'sub_category_id',
        'category_id',
        'product_slug',
        'vendor_id',
        'product_thumbnail', // if applicable
        'product_slug',
    ];
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $guarded = [];
    public $timestamps = false;


    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'sub_category_id', 'category_id');
    }

    // Define the relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(SubcategoryModel::class, 'sub_category_id', 'sub_category_id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'vendor_id');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'vendor_id', 'id');
}
}
