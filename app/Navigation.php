<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Navigation extends Model
{
    public function categories(): HasMany
    {
        return $this->hasMany(NavigationCategory::class)->orderBy('order');
    }
}
