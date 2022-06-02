<?php

/**
 * * @var array $users
 * * @var array $address
 * * @var array $measurements
 * * @var array $result
 */
?>
<div class="modal" id="new-address" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-20">
      <a href="#" class="close" role="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </a>
      <h5 class="modal-title">Opret adresse</h5>
      <form action="<?= url('address-create') ?>" method="post">
        <input class="form-control" type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
        <div class="form-group">
          <label for="" class="required">Adresse:</label>
          <input class="form-control" type="text" name="address" id="" placeholder="Adresse">
        </div>
        <div class="form-group">
          <label for="Post-nr." class="required">Post-nr.:</label>
          <input list="select" class="form-control" name="zip_code">
          <datalist  id="select">
            <?= view('liste/zip_code') ?>
          </datalist>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Opret</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal" id="new-measurement" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-20">
      <a href="#" class="close" role="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </a>
      <h5 class="modal-title">Opret måling</h5>
      <form action="<?= url('measurement-create') ?>" method="post">
      <input type="hidden" name="id" value="<?= $address['id'] ?>">
      <div class="form-group">
        <label for="Måling navn" class="required">Måling navn:</label>
          <input class="form-control" type="text" name="measurement_name" id="" placeholder="Måling navn" required>
      </div>
      <div class="form-group">
        <label for="Måling type" class="required">Måling type:</label>
        <select class="form-control" name="Mtype" id="">
            <?= view('liste/measurement_type') ?>
          </select>
      </div>
      <div class="form-group">
        <label for="Enhed" class="required">Enhed:</label>
        <select class="form-control" name="unit" id="">
          <option value="">Vælge en enhed</option>
              <?= view('liste/unit') ?>
          </select>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Opret</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php foreach ($measurements as $value) { ?>
<div class="modal" id="<?= $value['id'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-20">
      <a href="#" class="close" role="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </a>
      <h5 class="modal-title">Opret resultat</h5>
      <form action="<?= url('measurement-result') ?>" method="post">
      <input type="hidden" name="address" value="<?= $address['id'] ?>">
      <input type="hidden" name="id" value="<?= $value['id'] ?>">
      <div class="form-group">
        <label for="Resultat" class="required">Resultat:</label>
          <input class="form-control" type="text" name="result" id="" placeholder="resultat">
      </div>
      <div class="form-group">
        <label for="Dato" class="required">Dato:</label>
          <input class="form-control" type="date" name="date" id="" placeholder="Dato">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Opret</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php } ?>