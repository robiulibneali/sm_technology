<?php

namespace App\Models;

use App\Models\Admin\BlogManagement\Blog;
use App\Models\Admin\BlogManagement\BlogComment;
use App\Models\Admin\RoleManagement\Role;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $fillable = ['name', 'email', 'password', 'mobile', 'facebook_id', 'google_id'];

    protected $searchableFields = ['*'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_confirmed_at' => 'datetime',
    ];

    protected static $user, $users;

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($user){
            if (!empty($user->roles))
            {
                $user->roles()->detach();
            }
        });
    }

    public static function createOrUpdateUser ($request, $id = null)
    {
        if (isset($id))
        {
            self::$user = User::find($id);
        } else {
            self::$user = new User();
        }
        self::$user->name       = $request->name;
        self::$user->email      = $request->email;
        self::$user->mobile     = $request->mobile;
        if (isset($request->password))
        {
            self::$user->password   = Hash::make($request->password);
        } else {
            if (isset($id))
            {
                self::$user->password   = User::find($id)->password;
            }
        }
//        self::$user->status     = $request->status == 'on' ? 1 :  0/*($request->request_form == 'user' ? 1 : 0)*/;
        self::$user->save();
        if (empty($request->user_try_update) && $request->user_try_update != 1)
        {
            self::$user->roles()->sync($request->roles);
        }
        return self::$user;
    }

    public static function deleteUser($id)
    {
        self::$user = User::find($id);
        self::$user->roles()->detach();
        self::$user->delete();
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function blogComments()
    {
        return $this->hasMany(BlogComment::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
