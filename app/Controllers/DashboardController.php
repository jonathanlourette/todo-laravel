<?php

declare(strict_types=1);

namespace App\Controllers;

use Illuminate\Http\Request;

class DashboardController extends BaseController 
{
    public function index(Request $request): mixed
    {
        return view('dashboard');
    }
}