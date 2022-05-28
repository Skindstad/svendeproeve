<?php

namespace App\Middleware\Auth;

use App\Auth;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Administrator implements IMiddleware
{
    public function handle(Request $request): void
    {
        // Send user to home page, if they are not an administrator.
        if (! Auth::guard('admin'))
            redirect(url('home'));
    }
}
