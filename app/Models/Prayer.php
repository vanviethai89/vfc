<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prayer extends Model
{
    const STATUS_NEW = 'NEW';
    const STATUS_COMPLETED = 'COMPLETED';

    use HasFactory;
}
