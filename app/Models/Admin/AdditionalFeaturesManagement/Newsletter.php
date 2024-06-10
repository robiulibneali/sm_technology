<?php

namespace App\Models\Admin\AdditionalFeaturesManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'is_valid_email',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $newsletter;

    public static function createOrUpdateNewsletter($request, $id = null)
    {
        if (isset($id))
        {
            self::$newsletter = Newsletter::find($id);
        } else {
            self::$newsletter = new Newsletter();
        }
        self::$newsletter->name      = $request->name;
        self::$newsletter->email   = $request->email;
        self::$newsletter->mobile     = $request->mobile;self::$newsletter->status           = $request->status == 'on' ? 1 : 0;
        self::$newsletter->save();
    }

    public static function deleteNewsletter($id)
    {
        self::$newsletter = Newsletter::find($id);
        self::$newsletter->delete();
    }
}
