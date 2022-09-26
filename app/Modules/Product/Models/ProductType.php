<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductType extends Model {

    protected $table = 'product_types';
    protected $fillable = [
        'id',
        'name',
        'status',
        'is_archive',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public static function getProductTypeList()
    {
        $query = ProductType::where('is_archive',false);
        return $query->orderBy('id','desc');
    }

}
