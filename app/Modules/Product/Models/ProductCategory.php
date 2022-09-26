<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductCategory extends Model {

    protected $table = 'product_categories';
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

    public static function getProductCategoryList()
    {
        $query = ProductCategory::where('is_archive',false);
        return $query->orderBy('id','desc');
    }

    public static function getProductCategoryInfo($productCategoryId)
    {
      return ProductCategory::join('users','users.id','=','product_categories.created_by')
      ->where('product_categories.id',$productCategoryId)
      ->select('product_categories.*','users.name as author_name')
      ->first();
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($data){
          if(auth()->check())
          {
            $data->created_by = auth()->user()->id;
            $data->updated_by = auth()->user()->id;
          }
        });

        static::updating(function($data) {
            $data->updated_by = auth()->user()->id;
        });
    }

}
