<?php

namespace AsaGick\Portfolio\Models;

use AsaGick\Portfolio\Models\traits\Scopes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory, Scopes;

    protected $fillable = [
        'title',
        'experience_type',
        'description',
        'location',
        'image_url',
        'start_at',
        'end_at'
    ];

    public function CompanyLogo(): Attribute
    {
        return Attribute::make(
            function ($value) {
                if (is_null($value)) {
                    return 'assets';
                }
                return $value;
            }
        );
    }
}
