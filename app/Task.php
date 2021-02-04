<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// この行を追加
use Carbon\Carbon;

class Task extends Model
{
    //

    public function  getFormattedDueDateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
