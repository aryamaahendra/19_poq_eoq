<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SellItem extends Model
{
    use HasFactory;

    protected $table = 'sell_items';
    protected $guarded = [];

    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class, 'component_id');
    }

    public function sell(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'sell_id');
    }
}
