<?php

namespace App\Middleware\Auth;

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use App\Auth;

class Guest implements IMiddleware
{
    public function handle(Request $request): void
    {
        // Send user to home page, if they are not a guest.
        if (! Auth::guard('guest'))
            redirect(url('home'));
    }
}