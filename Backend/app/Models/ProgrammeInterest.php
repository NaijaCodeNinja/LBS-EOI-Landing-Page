<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgrammeInterest extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'programme',
        'message',
    ];
}
