<?php

namespace App\Enums\Network;

use BenSampo\Enum\Enum;


/**
 * @method static static Bandbox()
 * @method static static GanderRadio()
 * @method static static ShanwickRadio()
 * @method static static GanderDelivery()
 * @method static static ShanwickDelivery()
 * @method static static Staff()
 */
final class LogonPositionType extends Enum
{
    const Bandbox = 'BDBX';
    const GanderRadio = 'CZQR';
    const ShanwickRadio = 'EGGR';
    const GanderDelivery = 'CZQD';
    const ShanwickDelivery = 'EGGD';
    const Staff = 'CZQS';
}
