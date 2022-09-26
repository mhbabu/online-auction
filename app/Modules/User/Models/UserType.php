<?php

namespace App\Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model {

    protected $table = 'user_types';
    protected $fillable = [
        'id',
        'type_name',
        'status',
        'is_archive',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token'
    ];

    public static function boot() {
        parent::boot();
        static::creating(function($user) {
           if(auth()->user()){
               $user->created_by = auth()->user()->id;
               $user->updated_by = auth()->user()->id;
           }
        });

        static::updating(function($user) {
           if(auth()->user())
               $user->updated_by = auth()->user()->id;
        });
    }

}
