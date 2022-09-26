<?php

namespace App\Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\User\Models\User;

class ContactUs extends Model
{
    use SoftDeletes;

    protected $table = 'contact_us';
    protected $fillable = [
        'id',
        'name',
        'email',
        'subject',
        'message',
        'status',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function deleteUser(){
        return $this->belongsTo(User::class,'deleted_by','id');
    }

    public static function getContactUsList()
    {
        return $query = ContactUs::latest();
    }

    public static function boot()
    {
        parent::boot();
 
        static::deleting(function($user) {
            $user->deleted_by = auth()->user()->id;
            $user->save();
          });
    }

}
