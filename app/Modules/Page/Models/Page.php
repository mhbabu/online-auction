<?php

namespace App\Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Storage;

class Page extends Model
{
    use SoftDeletes;

    protected $table = 'pages';
    protected $primaryKey = 'key';
    public $incrementing = false;
    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = [
        'id',
        'key',
        'body',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public static function getPageInfo($key)
    {
        return Page:: whereKey($key)->Active()->first();
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
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

        static::deleting(function($user) {
            $user->deleted_by = auth()->user()->id;
            $user->save();
          });
    }

}
