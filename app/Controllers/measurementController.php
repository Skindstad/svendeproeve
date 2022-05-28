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
      $result = DB::select('SELECT *, DATE_FORMAT(dato, ?) as date FROM result order by date desc',['%d-%m-%Y']);

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
    public function destroy($id): void
    {

        $doc = DB::selectFirst('select * from measurement where id = ?', [$id]);

         if ($doc === null)
            redirectWithError(url('/'. input('address') .'/measurement'), 'Det givne måling kunne ikke findes.');

        $result = DB::select('SELECT * FROM result WHERE measurement_id = ?',[$doc['id']]);

        foreach($result as $val){
          DB::delete('delete from result where id = ?', [$val['id']]);
        }
         DB::delete('delete from measurement where id = ?', [$id]);

         redirect(url('/'. input('address') .'/measurement'));
    }
}