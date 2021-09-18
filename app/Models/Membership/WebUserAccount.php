<?php

namespace App\Models\Membership;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebUserAccount extends Model
{
    protected $connection = 'web';
    protected $table = 'users';


}

