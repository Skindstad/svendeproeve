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
    public function settings(): string
    {
        return view('settings');
    }
    public function store(): void
    {
        $user = DB::selectFirst('SELECT * FROM users WHERE username = ?', [input('username')]);

        $validation = validate(input()->all(), [
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'repeatpassword' => 'required|same:password'
        ]);

        if ($validation)
            redirect(url(''));

        if ($user['username'] !== null)
            redirectWithError(url(''), 'Denne brugennavnet findes allerede');

        if ($user['email'] !== null)
            redirectWithError(url(''), 'Denne email findes allerede');

        if (input('password') == input('repeatpassword'))
            DB::insert('INSERT INTO users (`firstname`,`lastname`, `username`, `password`, `email`) VALUES (?, ?, ?, ?, ?)', [
                input('firstname'),
                input('lastname'),
                input('username'),
                password_hash(input('password'), PASSWORD_BCRYPT),
                input('email'),
            ]);
        redirect(url('home'));
    }
    public function login(): void
    {

        $user = DB::selectFirst('select * from users where username = ?', [input('username')]);

        $validation = validate(input()->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validation)
            redirect(url(''));

        if ($user === null)
            redirectWithError(url(''), 'Den givne bruger kunne ikke findes.');

        if (!password_verify(input('password'), $user['password']))
            redirectWithError(url(''), 'Kodeordet er forkert. Prøv igen.');

        $_SESSION['user'] = $user;

        redirect(url('address'));
    }
    public function update(): void
    {
        redirect(url('settings'));
    }
    public function signout()
    {
        $_SESSION['user'] = null;
        redirect(url('home'));
    }
}
