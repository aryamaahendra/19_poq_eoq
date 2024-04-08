<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Algorithm extends Model
{
    use HasFactory;

    protected $table = "algorithm";
    protected $guarded = [];

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class, 'component_id');
    }
}
