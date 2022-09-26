<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

    protected $table = 'newsletters';
    protected $fillable = [
        'id',
        'email',
        'subscribed_at',
        'ip_address',
        'status',
        'is_archive',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public static function getNewsletterList()
    {
        $query = Newsletter::where('is_archive',false);
        return $query->orderBy('id','desc');
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function($data){
          if(auth()->check()){
            $data->created_by = auth()->user()->id;
            $data->updated_by = auth()->user()->id;
          }
        });

        static::updating(function($data) {
            $data->updated_by = auth()->user()->id;
        });
    }

}
