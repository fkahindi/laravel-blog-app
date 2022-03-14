<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'meta_description',
        'meta_keywords',
        'image',
        'image_caption',
        'published',
        'user_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'published' => 'boolean',
        'user_id' => 'integer'
    ];
}
