<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EssentialMedicine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the medicine that owns the EssentialMedicine
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    **/
    public function medicine(): BelongsTo
    {
        return $this->belongsTo(Medicine::class);
    }
}
