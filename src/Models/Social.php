<?php

namespace AsaGick\Portfolio\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'platform',
        'logo_url',
        'socialable_id',
        'socialable_type',
    ];
}
