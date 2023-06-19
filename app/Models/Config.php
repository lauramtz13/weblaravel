<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        '_slogan',
        '_razonsocial',
        '_email',
        '_direccion',
        '_celular',
        '_logo',
        '_favicon',
        'seo_title',
        'seo_description',
        'seo_image',
        'link_facebook',
        'link_whatsapp',
        'link_tiktok',
        'link_instagram'
    ];


}
