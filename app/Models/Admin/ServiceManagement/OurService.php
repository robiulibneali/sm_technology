<?php

namespace App\Models\Admin\ServiceManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurService extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'our_service_category_id',
        'title',
        'icon_class',
        'image',
        'thamb_image',
        'short_description',
        'long_description',
        'view_count',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'our_services';

    protected static $ourService;

    public static function createOrUpdateOurService($request, $id = null)
    {
        if (isset($id))
        {
            self::$ourService = OurService::find($id);
            self::$ourService->increment('view_count');
//            if ($ourService) {
//                self::$ourService->increment('view_count');
//            }
        } else {
            self::$ourService = new OurService();
        }
        self::$ourService->our_service_category_id      = $request->our_service_category_id;
        self::$ourService->title                        = $request->title;
        self::$ourService->icon_class                   = $request->icon_class;
        self::$ourService->short_description            = $request->short_description;
        self::$ourService->long_description             = $request->long_description;
        self::$ourService->image                        = fileUpload($request->file('image'), 'service_management/our_services', isset($id) ? static::find($id)->image : '');
        self::$ourService->thamb_image                  = fileUpload($request->file('thamb_image'), 'service_management/our_services', isset($id) ? static::find($id)->thamb_image : '');
        self::$ourService->status                       = $request->status == 'on' ? 1 : 0;
        self::$ourService->save();
    }

    public static function deleteOurService($id)
    {
        self::$ourService = OurService::find($id);
        deleteFileFromServer(self::$ourService->image);
        deleteFileFromServer(self::$ourService->thamb_image);
        self::$ourService->delete();
    }

    public function ourServiceCategory()
    {
        return $this->belongsTo(OurServiceCategory::class);
    }
}
