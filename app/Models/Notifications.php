<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Notifications extends Model
{
    use HasFactory;

    protected $table = "notifications";

    protected $fillable = ['user', 'message', 'icon', 'redirect', 'url', 'status'];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value);
    }
}
