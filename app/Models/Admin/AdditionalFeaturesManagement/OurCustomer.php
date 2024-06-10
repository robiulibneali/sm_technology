<?php

namespace App\Models\Admin\AdditionalFeaturesManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurCustomer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'company_name',
        'person_name',
        'company_logo',
        'description',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'our_customers';

    protected static $ourCustomer;

    public static function createOrUpdateOurCustomer($request, $id = null)
    {
        if (isset($id))
        {
            self::$ourCustomer = OurCustomer::find($id);
        } else {
            self::$ourCustomer = new OurCustomer();
        }
        self::$ourCustomer->company_name       = $request->company_name;
        self::$ourCustomer->person_name        = $request->person_name;
        self::$ourCustomer->description        = $request->description;
        self::$ourCustomer->company_logo       = fileUpload($request->file('company_logo'), 'additional-features-management/our-customers', isset($id) ? static::find($id)->company_logo : '');
        self::$ourCustomer->status             = $request->status == 'on' ? 1 : 0;
        self::$ourCustomer->save();
    }

    public static function deleteOurCustomer($id)
    {
        self::$ourCustomer = OurCustomer::find($id);
        deleteFileFromServer(self::$ourCustomer->company_logo);
        self::$ourCustomer->delete();
    }
}
