<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    public function navigationCategory() {
        return $this->belongsTo(NavigationCategory::class);
    }
}
