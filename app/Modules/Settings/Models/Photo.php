<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

    protected $table = 'photos';
    protected $fillable = [
        'id',
        'reference_id',
        'reference_type',
        'directory',
        'photo',
        'path',
        'dimensions',
        'status',
        'is_archive',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at'
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
