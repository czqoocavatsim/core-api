<?php

namespace App\Services\Network;

use App\Models\Network\VatsimLogonPosition;

class VatsimLogonPositionService
{
    public function getAll()
    {
        return VatsimLogonPosition::all()->makeHidden(['id', 'updated_at', 'created_at']);
    }

    public function getPosition(VatsimLogonPosition $position)
    {
        return $position->setHidden(['id', 'updated_at', 'created_at'])->setAttribute('sessions', route('network.position.sessions', $position));
    }

    public function getSessionsForPosition(VatsimLogonPosition $position)
    {
        $sessions = $position->controllerSessions;
        foreach ($sessions as $session) {
            $session->setAttribute('url', route('network.session.get', $session));
        }
        return $sessions;
    }
}
