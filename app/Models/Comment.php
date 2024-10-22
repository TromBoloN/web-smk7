<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'post_id',
        'name',
        'email',
        'comment',
        'website',
    ];

    /**
     * Relationship to the Blog Post model.
     */
    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'post_id', 'post_id'); // adjust if needed
    }
}
