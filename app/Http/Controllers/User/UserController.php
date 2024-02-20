<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class UserController extends Controller
{
    public function getUserProfile(): View|Application|Factory
    {
        return view('user.profile');
    }
}
