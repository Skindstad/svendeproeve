<?php

/**
 * * @var array $address
 * @var array $measurement
 * @var array $result
 */
?>
<?= view('components/header', ['title' => 'measurement']) ?>
<div class="sticky-alerts">
  <?= view('components/toasts') ?>
</div>
<?= view('components/navbar') ?>
<?= view('modals/create_measurement', ['address' => $address]) ?>
<?= view('modals/create_result', ['measurement' => $measurement, 'address' => $address]) ?>
<div class="row">
  <div class="col-1"></div>
  <div class="col-8">
    <h1><?= $address['address'] ?></h1>
  </div>
  <div class="col align-self-center">
    <button class="btn btn-primary" data-toggle="modal" data-target="new-measurement">Opret måling</button>
  </div>
  <div class="col align-self-center">
    <button class="btn btn-primary" data-toggle="modal" data-target="new-result">Opret result</button>
  </div>
</div>
</div>
<?php foreach ($measurement as $value) { ?>
  <details class="collapse-panel mw-full" open>
    <summary class="collapse-header">
      <h2><?= $value['measurement_name'] ?></h2>
    </summary>
    <div class="collapse-content">
      <div class="row">
        <div class="col-6">
          <form action="<?= url('measurement-delete', ['measurement' => $value['id']]) ?>" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="address" value="<?= $address['id'] ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Er du sikker? Denne handling kan ikke fortrydes.');">
              Slet&nbsp;
              <i class="fas fa-trash"></i>
            </button>
          </form>
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
                    <td><?= $val['date'] ?></td>
                    <td><?= $val['result'] ?> <?= $value['unit'] ?></td>
                    <td>0</td>
                  </tr>
              <?php }
              } ?>
            </tbody>
          </table>
        </div>
        <div class="col-6"></div>
      </div>
    </div>
  </details>
<?php } ?>
<?= view('components/footer') ?>