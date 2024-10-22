<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_post';
    protected $primaryKey = 'post_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'title',
        'content',
        'published_at',
        'user_id',
        'category',
        'thumbnail',
    ];

    // Relationship with User (assuming you have a User model)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title); // Generate the slug from the title
        });

        static::updating(function ($post) {
            $post->slug = Str::slug($post->title); // Update slug if title changes
        });
    }
}
