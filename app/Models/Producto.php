<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
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
        'stock',
        'precio_anterior',
        'precio',
        'orden',    
        'visitas',
        'codigo',
        'publicado',        
        'subcategoria_id'
    ];
    
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function detalles()
    {
        return $this->hasMany(Detalle::class);
    }

}
