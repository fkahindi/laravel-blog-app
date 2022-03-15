<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Topic extends Model
{
    use HasFactory;

    /**
     * @param $value
     */
    protected $table = 'topics';

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

}
