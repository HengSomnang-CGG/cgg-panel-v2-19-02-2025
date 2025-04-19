<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class SidebarController
{
    public static function getSidebarItems()
    {
        return config('sidebar');
    }
}
