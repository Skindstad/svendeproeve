<?php

/**
 * @var array $addresses
 */
?>
<?= view('components/header', ['title' => 'adresse']) ?>
<div class="sticky-alerts">
  <?= view('components/toasts') ?>
</div>
<?= view('components/navbar') ?>
<?= view('modals/create') ?>
<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
    <div class="row d-flex">
      <div class="col-2 align-self-center p-20">
        <button class="btn btn-primary" data-toggle="modal" data-target="new-address">Opret Address</button>
      </div>
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
            <td>
              <form action="<?= url('address-delete', ['address' => $address['id']]) ?>" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Er du sikker? Denne handling kan ikke fortrydes.');">
                  Slet&nbsp;
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
        <?php $x++;
        } ?>
      </tbody>
    </table>
  </div>
  <div class="col-1"></div>
</div>

<?= view('components/footer') ?>