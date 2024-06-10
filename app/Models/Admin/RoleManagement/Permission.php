<?php

namespace App\Models\Admin\RoleManagement;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'permission_category_id',
        'title',
        'slug',
        'is_default',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected static $permission;

    public static function createOrUpdatePermission ($request, $id = null)
    {
        Permission::updateOrCreate(['id' => $id], [
            'permission_category_id'    => $request->permission_category_id,
            'title'                     => $request->title,
            'slug'                      => str_replace(' ', '-', $request->title),
            'is_default'                => 0,
            'status'                    => $request->status == 'on' ? 1 : 0,
        ]);
    }

    public static function deletePermission($id)
    {
        self::$permission = Permission::find($id);
        self::$permission->delete();
    }

    public function permissionCategory()
    {
        return $this->belongsTo(PermissionCategory::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
