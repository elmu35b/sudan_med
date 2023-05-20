<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medicine extends Model
{
    use HasFactory;


    protected $guarded =['id'];
    /**
     * Get the user that owns the Medicine
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the city that owns the Medicine
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class,);
    }
}
