<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\ApiAccount
 *
 * @property string $id
 * @property string $name
 * @property string $origin_uri
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\ApiAccountFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount whereOriginUri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApiAccount whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ApiAccount extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'name', 'origin_uri'
    ];
}
