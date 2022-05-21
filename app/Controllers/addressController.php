<?php

namespace App\Controllers;

use App\DB;
use Rakit\Validation\Validator;

class addressController
{
    public function index(): string
    {

       $addresses = DB::select('SELECT * FROM address WHERE user_id = ?', [$_SESSION['user']['id']]);


        return view('adresse', [
            'addresses' => $addresses
        ]);
    }
    public function store(): void
    {
        DB::insert('INSERT INTO address (`user_id`, `address`,`zip_code`) VALUES (?, ?, ?)', [
            input('id'),
            input('address'),
            input('zipcode'),
        ]);
        redirect(url('/address'));    
        
    }
}