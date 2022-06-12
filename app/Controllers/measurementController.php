<?php

namespace App\Controllers;

use App\DB;
use Rakit\Validation\Validator;
use DateTime;

class measurementController
{
  public function index($addressId): string
  {
    $address = DB::selectFirst('SELECT * FROM address WHERE id = ?', [$addressId]);
    $measurement = DB::select('SELECT * FROM measurement WHERE address_id = ?', [$addressId]);

     $measurements = [];
     // looper measurement
    foreach ($measurement as $value) {
      $x = 0; $increase = [];
      $results = DB::select('SELECT *, DATE_FORMAT(dato, ?) as date FROM result WHERE measurement_id = ? order by dato desc', ['%d-%m-%Y', $value['id']]);
      // looper result
      foreach ($results as $result) {
        // just check if the id macths the measurement_id
       if ($result['measurement_id'] == $value['id']) { $x++;
          // if not the end of the array it will take the if statment
          if (end($results)['id'] != $result['id']) {
            $datetime1 = new DateTime($result['date']); $datetime2 = new DateTime($results[$x]['date']);
            $interval = $datetime1->diff($datetime2);
            $increase[] = array('id' => $result['id'], 'date' => $result['date'], 'result' => $result['result'], 'increase' => $result['result'] - $results[$x]['result'], 'day' => ( $result['result'] - $results[$x]['result']) / $interval->format('%a'));
          } else {
            $increase[] = array('id' => $result['id'], 'date' => $result['date'], 'result' => $result['result'], 'increase' => 0, 'day' => 0);
          }
        } 
      }
      // sample the two arrays together
      $measurements[] = array('id' => $value['id'], 'name' => $value['measurement_name'], 'unit' => $value['unit'], 'result' => $increase);
    } 

    return view('measurement', [
      "address" => $address,
      "measurements" => $measurements,
    ]);
  }
  public function store(): void
  {
    $validation = validate(input()->all(), [
      'measurement_name' => 'required',
      'unit' => 'required',
    ]);

    if ($validation)
      redirect(url('/' . input('id') . '/measurement'));


    DB::insert('INSERT INTO measurement (`address_id`,`measurement_name`, `measurement_type`, `unit`) VALUES (?, ?, ?, ?)', [
      input('id'),
      input('measurement_name'),
      input('Mtype'),
      input('unit'),
    ]);

    redirect(url('/' . input('id') . '/measurement'));
  }

  public function result(): void
  {
    $measurement = DB::selectFirst('SELECT * FROM measurement WHERE id = ?', [input('id')]);

    $validation = validate(input()->all(), [
      'result' => 'required',
      'date' => 'required',
    ]);

    if ($measurement === null)
      redirectWithError(url('/' . input('address') . '/measurement'), 'Det givne måling kunne ikke findes.');

    $result = DB::selectFirst('SELECT * FROM result WHERE measurement_id = ? AND dato = ?', [input('id'), input('date')]);

    if ($result !== null)
      redirectWithError(url('/' . input('address') . '/measurement'), 'Du kan ikke have to målinger den samme dato');

    if ($validation)
      redirect(url('/' . input('address') . '/measurement'));

    $result = DB::select('SELECT * FROM result WHERE measurement_id = ?', [input('id')]);

      DB::insert('INSERT INTO result (`measurement_id`,`result`, `dato`) VALUES (?, ?, ?)', [
      input('id'),
      input('result'),
      input('date'),
    ]);  

      redirect(url('/' . input('address') . '/measurement')); 
  }

  public function update(): void {

    $validation = validate(input()->all(), [
      'result' => 'required',
    ]);

    if ($validation)
      redirect(url('/' . input('address') . '/measurement'));
     
    
     DB::update('UPDATE result SET result = ? WHERE id = ?', [
        input('result'),
        input('id'),
    ]); 


     redirect(url('/' . input('address') . '/measurement'));
  }


  public function destroy($id): void
  {

    $doc = DB::selectFirst('select * from measurement where id = ?', [$id]);

    if ($doc === null)
      redirectWithError(url('/' . input('address') . '/measurement'), 'Det givne måling kunne ikke findes.');

    $result = DB::select('SELECT * FROM result WHERE measurement_id = ?', [$doc['id']]);

    foreach ($result as $val) {
      DB::delete('delete from result where id = ?', [$val['id']]);
    }
    DB::delete('delete from measurement where id = ?', [$id]);

    redirect(url('/' . input('address') . '/measurement'));
  }
}
