<?php

namespace App\Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class Biding extends Model
{

    protected $table = 'bidings';
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'price',
        'biding_date'
    ];

    public static function getProductBidingList()
    {
        $userType = auth()->user()->user_type;
        $userId = auth()->user()->id;

        if($userType == '1x101'){
            $query = Biding::leftJoin('products', 'products.id','=','bidings.product_id')
                ->leftJoin('users','users.id','=','bidings.user_id');
        }else{
            $query = Biding::leftJoin('products', 'products.id','=','bidings.product_id')
                ->leftJoin('users','users.id','=','bidings.user_id')
                ->where('bidings.user_id', $userId);
        }
        return $query->orderBy('bidings.id', 'desc');
    }




}
