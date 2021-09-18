<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

class ApiAccount extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name', 'origin_uri'
    ];
}
