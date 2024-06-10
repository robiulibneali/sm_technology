<?php

namespace App\Models\Admin\BlogManagement;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Blog extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'blog_category_id',
        'user_id',
        'title',
        'main_image',
        'short_description',
        'long_description',
        'hit_count',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $blog;

    public static function createOrUpdateBlog($request, $id = null)
    {
        if (isset($id))
        {
            self::$blog = Blog::find($id);
        } else {
            self::$blog = new Blog();
        }
        self::$blog->blog_category_id       = $request->blog_category_id;
        self::$blog->user_id                = Auth::id();
        self::$blog->title                  = $request->title;
        self::$blog->short_description      = $request->short_description;
        self::$blog->long_description       = $request->long_description;
        self::$blog->main_image             = fileUpload($request->file('main_image'), 'blog_management/blogs', isset($id) ? static::find($id)->main_image : '');
        self::$blog->status                 = $request->status == 'on' ? 1 : 0;
        self::$blog->save();
    }

    public static function deleteBlog($id)
    {
        self::$blog = Blog::find($id);
        deleteFileFromServer(self::$blog->image);
        self::$blog->delete();
    }

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function authorName()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }
}
