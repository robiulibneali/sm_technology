<?php

namespace App\Models\Admin\AdditionalFeaturesManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExpertTeamMember extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'position',
        'image',
        'description',
        'fb_link',
        'x_link',
        'twitter_link',
        'linkedin_link',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'expert_team_members';

    protected static $expertTeamMember;

    public static function createOrUpdateExpertTeamMember($request, $id = null)
    {
        if (isset($id))
        {
            self::$expertTeamMember = ExpertTeamMember::find($id);
        } else {
            self::$expertTeamMember = new ExpertTeamMember();
        }
        self::$expertTeamMember->name               = $request->name;
        self::$expertTeamMember->position           = $request->position;
        self::$expertTeamMember->description        = $request->description;
        self::$expertTeamMember->fb_link            = $request->fb_link;
        self::$expertTeamMember->x_link             = $request->x_link;
        self::$expertTeamMember->twitter_link       = $request->twitter_link;
        self::$expertTeamMember->linkedin_link      = $request->linkedin_link;
        self::$expertTeamMember->image              = fileUpload($request->file('image'), 'additional_features_management/expert_team_member', isset($id) ? static::find($id)->image : '');
        self::$expertTeamMember->status             = $request->status == 'on' ? 1 : 0;
        self::$expertTeamMember->save();
    }

    public static function deleteExpertTeamMember($id)
    {
        self::$expertTeamMember = ExpertTeamMember::find($id);
        deleteFileFromServer(self::$expertTeamMember->company_logo);
        self::$expertTeamMember->delete();
    }
}
