<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NavigationCategory extends Model
{
    public function navigationItems(): HasMany
    {
        return $this->hasMany(NavigationItem::class)->orderBy('order');
    }

    public function navigation(): BelongsTo
    {
        return $this->belongsTo(Navigation::class);
    }
}
