<?php

namespace App\Http\Controllers\Network;

use App\Enums\Network\LogonPositionType;
use App\Http\Controllers\Controller;
use App\Models\Network\VatsimLogonPosition;
use App\Services\Network\VatsimLogonPositionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class VatsimLogonPositionsController extends Controller
{
    private $vatsimLogonPositionService;

    public function __construct(VatsimLogonPositionService $vatsimLogonPositionService)
    {
        $this->vatsimLogonPositionService = $vatsimLogonPositionService;
    }

    public function getAll(): JsonResponse
    {
        return $this->success(
            $this->vatsimLogonPositionService->getAll()
        );
    }

    public function getAllPositionTypes(): JsonResponse
    {
        return $this->success(
            LogonPositionType::getInstances()
        );
    }

    public function getPosition(VatsimLogonPosition $vatsimLogonPosition): JsonResponse
    {
        return $this->success(
            $this->vatsimLogonPositionService->getPosition($vatsimLogonPosition)
        );
    }

    public function getSessionsForPosition(VatsimLogonPosition $vatsimLogonPosition): JsonResponse
    {
        return $this->success(
            $this->vatsimLogonPositionService->getSessionsForPosition($vatsimLogonPosition)
        );
    }
}
