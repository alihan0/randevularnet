<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyMember extends Model
{
    use HasFactory;

    protected $table = "company_members";

    public function company()
    {
        return $this->belongsTo(Company::class, 'company');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
