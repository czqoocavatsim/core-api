<?php

namespace App\Enums\Network;

use BenSampo\Enum\Enum;

/**
 * @method static static None()
 * @method static static Instructor()
 * @method static static Assessor()
 */
final class LogonRequirement extends Enum
{
    const None = 'NONE';
    const Instructor = 'INST';
    const Assessor = 'ASSES';
}
