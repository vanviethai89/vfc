<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_COMPLETED = 'COMPLETED';

    protected $fillable = [
        'title',
        'content',
        'owner_name',
        'testimonial',
        'status'
    ];

    use HasFactory;

    public static function getListStatus()
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_COMPLETED
        ];
    }

    public function getContentFormattedAttribute()
    {
        return nl2br($this->content);
    }
}
