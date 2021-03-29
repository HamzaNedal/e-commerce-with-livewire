<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable,Cachable;
    protected $fillable = [
        'name',
        'slug',
        'fk_user',
        'fk_category',
        'description',
        'stock',
        'price',
        'status'
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
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
    public function category()
    {
        return $this->belongsTo(Category::class, 'fk_category', 'id');
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'fk_user', 'id');
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'fk_product', 'fk_color');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes', 'fk_product', 'fk_size');
    }
    public function media()
    {
        return $this->hasMany(Media::class, 'product_id', 'id');
    }
    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'fk_product', 'id');
    }
    public function additional_information()
    {
        return $this->hasMany(AdditionalInformation::class, 'product_id', 'id');
    }
}
