<?php

namespace App\Services\Network;

use App\Models\Network\VatsimLogonPosition;

class VatsimLogonPositionService
{
    public function getAll()
    {
        return VatsimLogonPosition::all();
    }

    public function getSessionsForPosition(VatsimLogonPosition $position)
    {
        return $position->controllerSessions;
    }
}
