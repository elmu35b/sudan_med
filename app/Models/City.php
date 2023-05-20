<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{

    protected $guarded = ['id'];
    use HasFactory;


    /**
     * Get all of the pharmacies for the City
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }


    /**
     * Get all of the pharmacies for the City
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
    **/
    public function pharmacies()
    {
        return $this->users()->where('type','pharmacy');
        // return $this->hasMany(User::class);
    }
}
