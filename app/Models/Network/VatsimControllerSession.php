<?php

namespace App\Models\Network;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Network\VatsimControllerSession
 *
 * @property string $id
 * @property int $cid
 * @property \Illuminate\Support\Carbon $logon_time
 * @property \Illuminate\Support\Carbon|null $logoff_time
 * @property float $frequency
 * @property int $visual_range
 * @property mixed|null $text_atis
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $position_id
 * @property-read \App\Models\Network\VatsimLogonPosition $logonPosition
 * @method static \Database\Factories\Network\VatsimControllerSessionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession query()
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereCid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereLogoffTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereLogonTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereTextAtis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VatsimControllerSession whereVisualRange($value)
 * @mixin \Eloquent
 */
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

    /**
     * Get the route key for the model.
     *
     * @return string
     *
    public function getRouteKeyName()
    {
        return 'id';
    }*/
}
