<?php



namespace App\Models;

use App\Traits\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    use HasFactory;
    use Filter;

    protected $searchQuery = ['title', 'category', 'is_editors_choice'];

    protected $table = 'blog_post';

    protected $guarded = [
        'id'
    ];

    // Relationship with User (assuming you have a User model)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $slug = Str::slug($post->title);
            $timestamp = now()->format('YmdHis');
            $post->slug = "{$slug}-{$timestamp}";
        });

        static::updating(function ($post) {
            $slug = Str::slug($post->title);
            $timestamp = now()->format('YmdHis');
            $post->slug = "{$slug}-{$timestamp}";
        });
    }
}
