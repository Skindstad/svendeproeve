<?php

namespace App;

/** Authorization */
class Auth
{
    public static function guard(...$roles): bool
    {
        if (! isset($_SESSION['user']))
            $_SESSION['user']['role'] = 'guest';

        return in_array($_SESSION['user']['role'], $roles, true);
    }
}
