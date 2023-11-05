<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Support\HasAdvancedFilter;
use App\Support\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasAdvancedFilter;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    /**
     * Properties to search in table
     * @var string[]     
     */
    const SEARCHABLE = [
        'id',
        'name',
        'email',
    ];
    /**
     * Properties to filter in table
    * @var string[]     
    */
    const FILTERABLE = [
        'name',
        'email',
    ];
    /**
     * Properties to sort in table
    * @var string[]     
    */
    const SORTABLE = [
        'id',
        'name',
        'email'
    ];
    public $searchable = self::SEARCHABLE;
    public $filterable = self::FILTERABLE;
    public $sortable = self::SORTABLE;
}
