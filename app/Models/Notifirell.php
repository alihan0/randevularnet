<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifirell extends Model
{
    use HasFactory;

    protected $table = "notifications";

    protected $fillable = ['type', 'priority', 'message', 'user', 'status', 'redirect', 'timestamp'];

    protected $guarded = ['id'];

}
