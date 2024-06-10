<?php

namespace App\Models\Admin\AdditionalFeaturesManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientFeedback extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'client_name',
        'client_country',
        'user_image',
        'feedback',
        'total_rating',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'client_feedbacks';

    protected static $clientFeedback;

    public static function createOrUpdateClientFeedback($request, $id = null)
    {
        if (isset($id))
        {
            self::$clientFeedback = ClientFeedback::find($id);
        } else {
            self::$clientFeedback = new ClientFeedback();
        }
        self::$clientFeedback->client_name      = $request->client_name;
        self::$clientFeedback->client_country   = $request->client_country;
        self::$clientFeedback->total_rating     = $request->total_rating;
        self::$clientFeedback->feedback         = $request->feedback;
        self::$clientFeedback->user_image       = fileUpload($request->file('user_image'), 'additional-features-management/client-feedbacks', isset($id) ? static::find($id)->user_image : '');
        self::$clientFeedback->status           = $request->status == 'on' ? 1 : 0;
        self::$clientFeedback->save();
    }

    public static function deleteClientFeedback($id)
    {
        self::$clientFeedback = ClientFeedback::find($id);
        deleteFileFromServer(self::$clientFeedback->user_image);
        self::$clientFeedback->delete();
    }
}
