<?php

declare(strict_types=1);

namespace App\Controllers;



class DashboardController extends BaseController
{
    public function index(): mixed
    {
        $taskCount = auth()->user()->tasks()->where('status', '=', false)->count();

        return view('dashboard', compact('taskCount'));
    }
}
