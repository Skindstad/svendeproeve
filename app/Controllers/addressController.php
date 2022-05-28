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
    public function destroy($id): void
    {

        $doc = DB::selectFirst('select * from address where id = ?', [$id]);

        if ($doc === null)
            redirectWithError(url('/address'), 'Det givne adresse kunne ikke findes.');

        $measurement = DB::select('SELECT * FROM measurement WHERE address_id = ?', [$doc['id']]);

        foreach ($measurement as $val) {
            $result = DB::select('SELECT * FROM result WHERE measurement_id = ?', [$doc['id']]);
            foreach ($result as $value) {
                DB::delete('delete from result where id = ?', [$value['id']]);
            }
            DB::delete('delete from measurement where id = ?', [$val['id']]);
        }


        DB::delete('delete from address where id = ?', [$id]);

         redirect(url('/address'));
    }
}
