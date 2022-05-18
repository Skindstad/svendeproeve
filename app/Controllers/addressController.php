<?php

namespace App\Controllers;

use App\DB;
use Rakit\Validation\Validator;

class addressController
{
    public function index(): string
    {

       $address = DB::select('SELECT * FROM address');

        echo $address;

        return view('adresse', [
            'address' => $address
        ]);
    }
    public function store(): void
    {
        DB::insert('INSERT INTO address (`user_id`, `address`,`zip_code`) VALUES (?, ?, ?)', [
            input('id'),
            input('address'),
            input('zipcode'),
        ]);
        redirect(url('/adresse'));    
        
    }
}