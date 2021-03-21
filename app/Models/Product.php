<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;
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

    public function categories()
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
}
