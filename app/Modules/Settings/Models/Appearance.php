<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Appearance extends Model {

    protected $table = 'appearance';
    protected $fillable = [
        'id',
        'name',
        'description',
        'logo',
        'website',
        'address',
        'email',
        'phone',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
        'pinterest',
        'google_plus',
        'youtube',
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
