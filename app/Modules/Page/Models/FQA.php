<?php

namespace App\Modules\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\User\Models\User;

class FQA extends Model
{
    use SoftDeletes;

    protected $table = 'fqas';
    protected $fillable = [
        'id',
        'question',
        'answer',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public static function getFQAList()
    {
        return $query = FQA::orderBy('id', 'desc');
    }

    public static function getFQAInfo($FQAId)
    {
        return FQA:: whereId($FQAId)->first();
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
