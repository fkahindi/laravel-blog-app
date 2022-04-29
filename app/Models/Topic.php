<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Topic extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * @param $value
     */
   // protected $table = 'topics';

    protected $dates =['deleted_at'];

    protected $fillable =[
        'name',
        'slug',
        'description',
        'keywords'
    ];

    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name']= $value;
        $this->attributes['slug']= Str::slug($value);
    }
/**
 * @return \Illuminiate\Database\Eloquent\Relations\HasMany
 */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
