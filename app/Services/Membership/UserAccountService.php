<?php

namespace App\Services\Membership;

use App\Models\Membership\WebUserAccount;

class UserAccountService
{
    public function getAllUserAccounts()
    {
        return WebUserAccount::all();
    }
}
