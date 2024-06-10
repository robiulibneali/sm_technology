<?php

namespace App\Models\Admin\AdditionalFeaturesManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SiteSettings extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'site_name',
        'favicon',
        'logo',
        'site_banner',
        'common_meta',
        'common_seo_header',
        'common_seo_footer',
        'meta_description',
        'footer_description',
        'phone',
        'email',
        'address',
        'google_map_embade_location_link',
        'fb_link',
        'twitter_link',
        'youtube_link',
        'linkedin_link',
        'x_link',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'site_settings';

    public static function saveOrUpdateSiteSetting($request, $id = null)
    {
        SiteSettings::updateOrCreate(['id' => $id], [
            'title'                             => $request->title,
            'site_name'                         => $request->site_name,
            'email'                             => $request->email,
            'phone'                             => $request->phone,
            'address'                           => $request->address,
            'common_meta'                       => $request->common_meta,
            'common_seo_header'                 => $request->common_seo_header,
            'common_seo_footer'                 => $request->common_seo_footer,
            'meta_description'                  => $request->meta_description,
            'footer_description'                => $request->footer_description,
            'google_map_embade_location_link'   => $request->google_map_embade_location_link,
            'twitter_link'                      => $request->twitter_link,
            'x_link'                            => $request->x_link,
            'fb_link'                           => $request->fb_link,
            'linkedin_link'                     => $request->linkedin_link,
            'youtube_link'                      => $request->youtube_link,
            'favicon'                           => fileUpload($request->file('favicon'), 'additional-features-management/site-settings/favicon', isset($id) ? static::find($id)->favicon : ''),
            'logo'                              => fileUpload($request->file('logo'), 'additional-features-management/site-settings/logo', isset($id) ? static::find($id)->logo : ''),
            'site_banner'                       => fileUpload($request->file('site_banner'), 'additional-features-management/site-settings/site-banner', isset($id) ? static::find($id)->site_banner : ''),
            'status'                            => 1,
        ]);
    }
}
