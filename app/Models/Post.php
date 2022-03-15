<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * @param $value
     */
    protected $table = 'posts';

    /**
     * @var array
     */
    protected $fillable = [
        'topic_id',
        'user_id',
        'title',
        'slug',
        'body',
        'meta_description',
        'meta_keywords',
        'image',
        'image_caption',
        'published'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'topic_id' => 'integer',
        'published' => 'boolean',
        'user_id' => 'integer'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
