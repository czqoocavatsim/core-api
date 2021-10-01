<?php

namespace App\Models\Network;

use App\Enums\Network\LogonPositionType;
use App\Enums\Network\LogonRequirement;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VatsimLogonPosition extends Model
{
    protected $casts = [
        'logon_requirement' => LogonRequirement::class,
        'type' => LogonPositionType::class
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
