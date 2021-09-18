<?php

namespace App\Http\Controllers\Membership;

use App\Http\Controllers\Controller;
use App\Services\Membership\UserAccountService;
use Illuminate\Http\JsonResponse;

class UserAccountController extends Controller
{
    private $userAccountService;

    public function __construct(UserAccountService $userAccountService)
    {
        $this->userAccountService = $userAccountService;
    }

    public function getAllUserAccounts(): JsonResponse
    {
        return $this->success($this->userAccountService->getAllUserAccounts());
    }
}
