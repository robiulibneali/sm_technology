<?php

namespace App\Models\Admin\AdditionalFeaturesManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'subject',
        'message',
        'status',
    ];

    protected $searchableFields = ['*'];

    public static function saveContact($request, $id = null)
    {
        Contact::updateOrCreate(['id' => $id], [
            'name'      => $request->name,
            'email'     => $request->email,
            'subject'   => $request->subject,
            'mobile'    => $request->mobile,
            'message'   => $request->message,
            'status'    => 1
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
    }
}
