<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'post_status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::updated(function ($post) {
            if ($post->isDirty('post_status') && $post->post_status === 'published') {
                $user = $post->user;
                if ($user) {
                    $user->update(['usertype' => 'volunteer']);
                }
            }
        });
    }
}
