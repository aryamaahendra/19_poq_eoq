<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Component extends Model
{
    use HasFactory;

    protected $table = 'components';
    protected $guarded = [];

    public function category(): BelongsTo
    {
        return $this->belongsTo(ComponentCategory::class, 'category_id');
    }

    public function algorithm(): HasOne
    {
        return $this->hasOne(Algorithm::class, 'component_id');
    }
}
