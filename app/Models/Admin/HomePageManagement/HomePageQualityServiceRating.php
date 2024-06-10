<?php

namespace App\Models\Admin\HomePageManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePageQualityServiceRating extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'rating', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'home_page_quality_service_ratings';

    protected static $homePageQualityServiceRating;

    public static function createOrUpdateHomePageQualityServiceRating($request, $id = null)
    {
        if (isset($id))
        {
            self::$homePageQualityServiceRating = HomePageQualityServiceRating::find($id);
        } else {
            self::$homePageQualityServiceRating = new HomePageQualityServiceRating();
        }
        self::$homePageQualityServiceRating->title      = $request->title;
        self::$homePageQualityServiceRating->rating     = $request->rating;
        self::$homePageQualityServiceRating->status     = $request->status == 'on' ? 1 : 0;
        self::$homePageQualityServiceRating->save();
    }

    public static function deleteHomePageQualityServiceRating($id)
    {
        self::$homePageQualityServiceRating = HomePageQualityServiceRating::find($id);
        self::$homePageQualityServiceRating->delete();
    }
}
