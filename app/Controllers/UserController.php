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
        $_SESSION['success'] = 'Din bruger er blevet oprettet!';
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
        $_SESSION['success'] = 'Du har logget ind';
        redirect(url('address'));
    }
    public function update(): void
    {
        $password = $_SESSION['user']['password'];

        $validation = validate(input()->all(), [
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
        ]);

        if ($validation)
            redirect(url('settings'));

        // if they change the password
        if (input('oldpassword') || input('newpassword') || input('repeatpassword')) {
            $failed = validate(input()->all(), [
                'password' => 'min:6|different:oldpassword',
                'repeatpassword' => 'required|same:password'
            ]);
            if ($failed)
                redirect(url('settings'));

            if (!password_verify(input('oldpassword'), $password))
                redirectWithError(url('settings'), 'Dette var ikke dit nuværende kodeord');

            $password = password_hash(input('newpassword'), PASSWORD_BCRYPT);
        }

        DB::update('UPDATE users SET firstname = ?, lastname = ?, username = ?, email = ?, password = ? WHERE id = ?', [
            input('firstname'),
            input('lastname'),
            input('username'),
            input('email'),
            $password,
            input('id'),
        ]);

        $user = DB::selectFirst('select * from users where id = ?', [input('id')]);
        $_SESSION['user'] = $user;
         redirect(url('settings'));
    }
    public function signout()
    {
        $_SESSION['user'] = null;
        redirect(url('home'));
    }
}
