<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class app_user extends Model
{
    use HasFactory;

    protected $table='app_user';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
