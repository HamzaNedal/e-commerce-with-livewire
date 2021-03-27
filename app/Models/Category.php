<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;

class Category extends Model
{
    use HasFactory,Sluggable,Cachable;

    protected $fillable = ['title','slug','status'];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function products(){
       return $this->hasMany(Product::class,'fk_category','id');
    }
    public function setStatusAttribute($status)
    {
        $this->attributes['status']  = $status ? 1 : 0;
    }
    public function scopeStatusToSearch($query, $value)
    {
        if($value == 'true'){
            $value = 1; 
        }else{
            $value = 0;
        }
        $query->where(['status'=>$value])->get();
    }
}
