<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    use HasFactory, SoftDeletes;

    //protected $table = 'replies';

    protected $dates =['deleted_at'];

    protected $fillable =[
        'user_id',
        'comment_id',
        'body'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
