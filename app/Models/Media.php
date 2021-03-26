<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory,Cachable;
    protected $fillable = [
        'product_id',
        'file_name',
        'file_size',
        'file_type',
       
    ];
}
