<?php

namespace App\Controllers;

use App\DB;
use Rakit\Validation\Validator;

class UserController
{
    public function index(): string
    {
        return view('home');
    }
    public function store(): void
    {
         if(input('pass') == input('gpass'))
            DB::insert('INSERT INTO users (`firstname`,`lastname`, `username`, `password`, `email`) VALUES (?, ?, ?, ?, ?)', [
                input('first'),
                input('last'),
                input('user'),
                password_hash(input('pass'), PASSWORD_BCRYPT),
                input('email'),
            ]);
            redirect(url('home'));    
        
    }
    public function login(): void
    {
        
        $user = DB::selectFirst('select * from users where username = ?', [input('user')]);

        if ($user === null)
            redirectWithError(url(''), 'Den givne bruger kunne ikke findes.');

 
       /*  if (! password_verify(input('pass'), $user['pass']))
            redirectWithError(url(''), 'Kodeordet er forkert. Prøv igen.'); */

        $_SESSION['user'] = $user;

        redirect(url('address'));
    }
    public function signout()
    {
        $_SESSION['user'] = null;
        redirect(url('home'));
    }
}