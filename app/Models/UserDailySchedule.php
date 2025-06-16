<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDailySchedule extends Model
{
    use HasFactory;

    public function shift()
    {
        return $this->belongsTo(UserSchedule::class, 'user_schedule_id', 'id');
    }
}
