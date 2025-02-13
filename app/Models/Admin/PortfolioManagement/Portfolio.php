<?php

namespace App\Models\Admin\PortfolioManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'image',
        'short_description',
        'long_description',
        'author_name',
        'fb_link',
        'twitter_link',
        'instagram_link',
        'linkedin_link',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $portfolio;

//    protected static function boot()
//    {
//        parent::boot(); // TODO: Change the autogenerated stub
//        static::deleting(function ($portfolio){
//            if (!empty($portfolio->portfolioCategories))
//            {
//                $portfolio->portfolioCategories()->detach();
//            }
//        });
//    }

    public static function createOrUpdatePortfolio($request, $id = null)
    {
        if (isset($id))
        {
            self::$portfolio = Portfolio::find($id);
        } else {
            self::$portfolio = new Portfolio();
        }
        self::$portfolio->title                     = $request->title;
        self::$portfolio->author_name               = $request->author_name;
        self::$portfolio->fb_link                   = $request->fb_link;
        self::$portfolio->twitter_link              = $request->twitter_link;
        self::$portfolio->instagram_link            = $request->instagram_link;
        self::$portfolio->linkedin_link             = $request->linkedin_link;
        self::$portfolio->short_description         = $request->short_description;
        self::$portfolio->long_description          = $request->long_description;
        self::$portfolio->image                     = fileUpload($request->file('image'), 'portfolio_management/portfolios', isset($id) ? static::find($id)->image : '');
        self::$portfolio->status                    = $request->status == 'on' ? 1 : 0;
        self::$portfolio->save();

        self::$portfolio->portfolioCategories()->sync($request->portfolio_categories);
        return self::$portfolio;
    }

    public static function deletePortfolio($id)
    {
        self::$portfolio = Portfolio::find($id);
        deleteFileFromServer(self::$portfolio->image);
        self::$portfolio->portfolioCategories()->detach();
        self::$portfolio->delete();
    }

    public function portfolioCategories()
    {
        return $this->belongsToMany(PortfolioCategory::class)->withPivot('portfolio_category_id', 'portfolio_id', 'link');
    }
}
