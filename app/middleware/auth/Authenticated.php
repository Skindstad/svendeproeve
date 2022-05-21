<?php

namespace App\Middleware\Auth;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use App\Auth;

class Authenticated implements IMiddleware
{
    public function handle(Request $request): void
    {
        if (! Auth::guard('user'))
            redirect(url('home'));
    }
}