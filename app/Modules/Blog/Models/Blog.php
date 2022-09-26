<?php

namespace App\Modules\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blogs';
    protected $fillable = [
        'id',
        'title',
        'image',
        'content',
        'featured',
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

    public static function getBlogList()
    {
        return $query = Blog::orderBy('id', 'desc');
    }

    public static function getBlogInfo($blogId)
    {
        return Blog:: whereId($blogId)->first();
    }

    public function scopeActive($query)
    {
        return $query->whereStatus(true);
    }

      // load image

      public function getImagePathAttribute()
      {
          return  Storage :: url('blog/'.$this->image);
      }
  
     // check image is exist
      public function getCheckImageExistAttribute()
      {
        if($this->image)
          return Storage::exists('blog/'.$this->image);
        else
        return false;
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
