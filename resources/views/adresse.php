<?php

/**
 * @var array $address
 */
?>
<?= view('components/header', ['title' => 'adresse'])?>
<?= view('components/navbar') ?>

<form action="/adresse/opret" method="post">
<div>
    <input type="hidden" name="id" value="1">
    <label for="">Adresse:
        <input type="text" name="address" id="" placeholder="Adresse">
    </label>
    </div>
    <div>
    <label for="">Post-nr.
        <input type="text" name="zipcode" id="" placeholder="Post nr.">
    </label>
    </div>
    <div>
        <button type="submit">opret</button>
    </div>
</form>
<table>
  <thead>
    <td>Adresse</td>
    <td>Post nr.</td>
    <td>Måling</td>
    <td>Slet</td>
  </thead>
  <tbody>
    <?php 
    echo $address;
    /* foreach($address ){ */ ?>
  <tr>
    <td>Bus 28</td>
    <td>8800 Viborg</td>
    <td><a href="/måling">Måling</a></td>
    <td><button>Slet</button></td>
  </tr>
  <?php /* } */ ?>
  </tbody>
</table>

<?= view('components/footer') ?>