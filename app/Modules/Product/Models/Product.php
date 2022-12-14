<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';
    protected $fillable = [
        'id',
        'category_id',
        'product_code',
        'type_id',
        'title',
        'slug',
        'description',
        'price',
        'end_time',
        'description',
        'product_token',

        'status',
        'is_archive',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public static function getProductList()
    {
        $userType = auth()->user()->user_type === '1x101';
        if($userType){
            $query = Product::leftJoin('product_categories', 'product_categories.id', 'products.category_id')
                ->leftJoin('product_types','product_types.id','=','products.type_id')
                ->where('products.is_archive', false);
        }else{
            $query = Product::leftJoin('product_categories', 'product_categories.id', 'products.category_id')
                ->leftJoin('product_types','product_types.id','=','products.type_id')
                ->where('products.is_archive', false)
                ->where('products.created_by',auth()->user()->id);
        }

        return $query->orderBy('products.id', 'desc');
    }

    public static function getProductInfo($productId)
    {
        return Product::leftJoin('users', 'users.id', 'products.created_by')
            ->leftJoin('product_categories', 'product_categories.id', 'products.category_id')
            ->where('products.is_archive', false)
            ->where('products.id', $productId)
            ->first([
                'products.*',
                'users.name as user_name',
                'product_categories.name as category_name'
            ]);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($data) {
            if (auth()->check()) {
                $data->created_by = auth()->user()->id;
                $data->updated_by = auth()->user()->id;
            }
        });

        static::updating(function ($data) {
            $data->updated_by = auth()->user()->id;
        });
    }

}
