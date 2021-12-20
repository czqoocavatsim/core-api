<?php

namespace App\Http\Controllers;

use App\Models\Network\VatsimControllerSession;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VatsimControllerSessionsController extends Controller
{
    public function getSession(VatsimControllerSession $vatsimControllerSession): JsonResponse
    {
        return $this->success(
            $vatsimControllerSession->load('logonPosition')->setHidden(['position_id', 'created_at', 'updated_at'])
        );
    }

    public function getSessionsForController($cid): JsonResponse
    {
        $sessions = VatsimControllerSession
            ::whereCid($cid)
            ->latest('logon_time')
            ->get()
            ->makeHidden(['created_at', 'updated_at', 'position_id'])
            ->load('logonPosition');
        return $this->success($sessions);
    }

    public function getActiveSessions(): JsonResponse
    {
        $sessions = VatsimControllerSession::with('logonPosition')
            ->where('logoff_time', null)
            ->get();
        return $this->success($sessions);
    }
}
