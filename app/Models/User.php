<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    //     'password',

    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Get all of the medicines for the User
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
    public function medicines(): HasMany
    {
        return $this->hasMany(Medicine::class);
    }

    /**
     * Get the city that owns the User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the pharmacy associated with the User
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
    **/
    public function pharmacy(): HasOne
    {
        return $this->hasOne(Pharmacy::class);
    }
}
