<?php

namespace App\Controllers;

class UserController
{
    public function create(): string
    {
        return view('users/create');
    }

    public function store()
    {
        //TODO: User registration logic

        redirect('home');
    }
}