<?php

namespace AsaGick\Portfolio\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'position',
        'pro_image',
        'desc',
    ];
}
