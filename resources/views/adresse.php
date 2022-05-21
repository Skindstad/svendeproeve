<?php

/**
 * @var array $addresses
 */
?>
<?= view('components/header', ['title' => 'adresse']) ?>
<?= view('components/navbar') ?>
<div class="row mt-20 pt-20">
  <div class="col-2"></div>
  <div class="col-8">
    <h1><?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></h1>
    <div class="card">
      <h2 class="card-title">Opret adresse</h2>
      <form action="<?= url('address-create') ?>" method="post">
        <input class="form-control" type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
        <div class="form-group">
          <label for="" class="required">Adresse:</label>
          <input class="form-control" type="text" name="address" id="" placeholder="Adresse" required>
        </div>
        <div class="form-group">
          <label for="Post-nr." class="required">Post-nr.:</label>
          <input class="form-control" type="text" name="zipcode" id="" placeholder="Post nr." required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Opret</button>
        </div>
      </form>
    </div>
    <table class="table">
      <thead>
        <td>#</td>
        <td>Adresse</td>
        <td>Post nr.</td>
        <td>Måling</td>
        <td>Slet</td>
      </thead>
      <tbody>
        <?php
        $x = 1;
        foreach ($addresses as $address) {  ?>
          <tr>
            <td><?= $x ?></td>
            <td><?= $address['address'] ?></td>
            <td><?= $address['zip_code'] ?></td>
            <td><a href="<?= url('measurement', ['addressId' => $address['id']]) ?>">Måling</a></td>
            <td><button type="submit" class="btn">Slet</button></td>
          </tr>
        <?php $x++;
        } ?>
      </tbody>
    </table>
  </div>
  <div class="col-2"></div>
</div>

<?= view('components/footer') ?>