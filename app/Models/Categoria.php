<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    public $timestamps = false;
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
    'portada',
    'publicado'
    ];
   
    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }

}
