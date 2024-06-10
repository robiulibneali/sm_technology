<?php

namespace App\Models\Admin\BlogManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogComment extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'blog_id',
        'user_id',
        'blog_comment_id',
        'comment_content',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'blog_comments';

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function authorName()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blogComment()
    {
        return $this->belongsTo(BlogComment::class);
    }

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }
}
