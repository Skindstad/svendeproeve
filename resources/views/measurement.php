<?php

/**
 * * @var array $address
 * @var array $measurement
 * @var array $result
 */
?>

<?= view('components/header', ['title' => 'measurement']) ?>
<?= view('components/navbar') ?>
<div class="mt-20 pt-20">
  <h1><?= $address['address'] ?></h1>

  <div class="card">
    <h2 class="card-title">Måling</h2>
    <form action="<?= url('measurement-create') ?>" method="post">
      <input type="hidden" name="id" value="<?= $address['id'] ?>">
      <div class="form-group">
        <label for="Måling navn" class="required">Måling navn:</label>
          <input class="form-control" type="text" name="Mname" id="" placeholder="Måling navn" required>
      </div>
      <div class="form-group">
        <label for="Måling type" class="required">Måling type:</label>
          <input class="form-control" type="text" name="Mtype" id="" placeholder="Måling type" required>
      </div>
      <div class="form-group">
        <label for="Enhed" class="required">Enhed:</label>
          <input class="form-control" type="text" name="unit" id="" placeholder="Enhed" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Opret</button>
      </div>
    </form>
  </div>
  <div class="card">
    <h2 class="card-title">Resultat</h2>
    <form action="<?= url('measurement-result') ?>" method="post">
      <input type="hidden" name="address" value="<?= $address['id'] ?>">
      <div class="form-group">
        <label for="Måling" class="required">Måling:</label>
          <select class="form-control" name="id" id="">
            <?php foreach ($measurement as $value) { ?>
              <option value="<?= $value['id'] ?>"><?= $value['measurement_name'] ?></option>
            <?php } ?>
          </select>
      </div>
      <div class="form-group">
        <label for="Resultat" class="required">Resultat:</label>
          <input class="form-control" type="text" name="result" id="" placeholder="resultat" required>
      </div>
      <div class="form-group">
        <label for="Dato" class="required">Dato:</label>
          <input class="form-control" type="date" name="dato" id="" placeholder="Dato" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Opret</button>
      </div>
    </form>
  </div>
  <?php foreach ($measurement as $value) { ?>
    <h2><?= $value['measurement_name'] ?></h2>
    <table class="table">
      <thead>
        <td>Dato</td>
        <td>Måling resultat (<?= $value['unit'] ?>)</td>
        <td>Stigning</td>
      </thead>
      <tbody>
        <?php foreach ($result as $val) {
          if ($val['measurement_id'] == $value['id']) { ?>
            <tr>
              <td><?= $val['dato'] ?></td>
              <td><?= $val['result'] ?> <?= $value['unit'] ?></td>
              <td>0</td>
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>
  <?php } ?>
</div>

<?= view('components/footer') ?>