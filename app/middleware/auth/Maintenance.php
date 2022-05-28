<?php


namespace App\Middleware\Auth;

use App\Auth;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Maintenance implements IMiddleware
{
    public function handle(Request $request): void
    {
        // Send user to home page, if they are not a guest.
        if (! Auth::guard('admin', 'maintenance'))
            redirect(url('home'));
    }
}