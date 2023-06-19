<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
    'id',
    'slug',
    'seo_title',
    'seo_description',
    'seo_image',
    'name',
    'description',
    'image',
    'orden',
    'visitas',
    'publicado',
    'producto_id'
    ];
   
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }


}
