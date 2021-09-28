<?php

namespace App\Models\Network;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VatsimControllerSession extends Model
{
    use HasFactory;

    //Database
    protected $connection = 'core';
    protected $table = 'vatsim_controller_sessions';

    //Casts
    protected $casts = [
        'frequency' => 'float'
    ];

    //Dates
    protected $dates = [
        'logon_time', 'logoff_time'
    ];

    /**
     * Return the logon position this session was on.
     *
     * @return BelongsTo
     */
    public function logonPosition(): BelongsTo
    {
        return $this->belongsTo(
            VatsimLogonPosition::class,
            'position_id'
        );
    }
}
