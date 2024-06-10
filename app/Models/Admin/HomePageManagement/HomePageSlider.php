<?php

namespace App\Models\Admin\HomePageManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePageSlider extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'note',
        'slider_image',
        'service_link',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'home_page_sliders';

    protected static $homePageSlider;

    public static function createOrUpdateHomePageSlider($request, $id = null)
    {
        if (isset($id))
        {
            self::$homePageSlider = HomePageSlider::find($id);
        } else {
            self::$homePageSlider = new HomePageSlider();
        }
        self::$homePageSlider->title            = $request->title;
        self::$homePageSlider->note             = $request->note;
        self::$homePageSlider->service_link     = $request->service_link;
        self::$homePageSlider->slider_image     = fileUpload($request->file('slider_image'), 'home_page_management/home_page_sliders', isset($id) ? static::find($id)->slider_image : '');
        self::$homePageSlider->status           = $request->status == 'on' ? 1 : 0;
        self::$homePageSlider->save();
    }

    public static function deleteHomePageSlider($id)
    {
        self::$homePageSlider = HomePageSlider::find($id);
        deleteFileFromServer(self::$homePageSlider->image);
        self::$homePageSlider->delete();
    }
}
