<?php

namespace App\Models\Network;

use App\Enums\Network\LogonPositionType;
use App\Enums\Network\LogonRequirement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Network\VatsimLogonPosition
 *
 * @property int $id
 * @property string $callsign
 * @property LogonRequirement $logon_requirement
 * @property LogonPositionType $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Network\VatsimControllerSession[] $controllerSessions
 * @property-read int|null $controller_sessions_count
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition whereCallsign($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition whereLogonRequirement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimLogonPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class VatsimLogonPosition extends Model
{
    protected $casts = [
        'logon_requirement' => LogonRequirement::class,
        'type' => LogonPositionType::class
    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    /**
     * Return the controller sessions for this logon position.
     *
     * @return HasMany
     */
    public function controllerSessions(): HasMany
    {
        return $this->hasMany(
            VatsimControllerSession::class,
            'position_id'
        );
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'callsign';
    }
}
