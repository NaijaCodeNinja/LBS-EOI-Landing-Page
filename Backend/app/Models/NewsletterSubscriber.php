<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    // Tell Laravel it is safe to auto-fill these specific columns
    protected $fillable = ['full_name', 'email']; 
}
