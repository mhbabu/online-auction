<?php

namespace App\Modules\Settings\Models;

use Illuminate\Database\Eloquent\Model;

class EmailQueue extends Model {

    protected $table = 'email_queue';
    protected $fillable = [
        'id',
        'to',
        'cc',
        'subject',
        'content',
        'attachment',
        'sending_status',
        'times_of_try',
        'remarks',
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
