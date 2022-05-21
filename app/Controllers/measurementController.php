<?php

namespace App\Controllers;

use App\DB;
use Rakit\Validation\Validator;

class measurementController
{
    public function index($addressId): string
    {
      $address = DB::selectFirst('SELECT * FROM address WHERE id = ?', [$addressId]);
      $measurement = DB::select('SELECT * FROM measurement WHERE address_id = ?', [$addressId]);
      $result = DB::select('SELECT * FROM result WHERE measurement_id',[]);

        return view('measurement', [
          "address" => $address,
          "measurement" => $measurement,
          "result" => $result
        ]);
    }
    public function store(): void
    {
        DB::insert('INSERT INTO measurement (`address_id`,`measurement_name`, `measurement_type`, `unit`) VALUES (?, ?, ?, ?)', [
          input('id'),
          input('Mname'),
          input('Mtype'),
          input('unit'),
      ]);

        redirect(url('/'. input('id') .'/measurement'));    
        
    }

    public function result(): void
    {
        DB::insert('INSERT INTO result (`measurement_id`,`result`, `dato`) VALUES (?, ?, ?)', [
          input('id'),
          input('result'),
          input('dato'),
      ]);

        redirect(url('/'. input('address') .'/measurement'));    
        
    }
}