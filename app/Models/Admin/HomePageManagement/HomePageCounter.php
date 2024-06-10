<?php

namespace App\Models\Admin\HomePageManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomePageCounter extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'counter_number', 'status'];

    protected $searchableFields = ['*'];

    protected $table = 'home_page_counters';

    protected static $homePageCounter;

    public static function createOrUpdateHomePageCounter($request, $id = null)
    {
        if (isset($id))
        {
            self::$homePageCounter = HomePageCounter::find($id);
        } else {
            self::$homePageCounter = new HomePageCounter();
        }
        self::$homePageCounter->title              = $request->title;
        self::$homePageCounter->counter_number     = $request->counter_number;
        self::$homePageCounter->status             = $request->status == 'on' ? 1 : 0;
        self::$homePageCounter->save();
    }

    public static function deleteHomePageCounter($id)
    {
        self::$homePageCounter = HomePageCounter::find($id);
        self::$homePageCounter->delete();
    }
}
