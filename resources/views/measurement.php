<?php

/**
 * * @var array $address
 * @var array $measurements
 */
?>
<?= view('components/header', ['title' => 'measurement']) ?>
<div class="sticky-alerts">
  <?= view('components/toasts') ?>
</div>
<?= view('components/navbar') ?>
<?= view('modals/create', ['measurements' => $measurements, 'address' => $address]) ?>
<?= view('modals/update', ['measurements' => $measurements,'address' => $address]) ?>
<div class="row">
  <div class="col-1"></div>
  <div class="col-8">
    <h1><?= $address['address'] ?></h1>
  </div>
  <div class="col align-self-center">
    <button class="btn btn-primary" data-toggle="modal" data-target="new-measurement">Opret måling</button>
  </div>
</div>
</div>
<?php foreach ($measurements as $value) { ?>
  <details class="collapse-panel mw-full" open>
    <summary class="collapse-header">
      <h2><?= $value['name'] ?></h2>
    </summary>
    <div class="collapse-content">
      <div class="row">
        <div class="col-6">
          <div class="row">
            <div class="col-3">
              <button class="btn btn-primary" data-toggle="modal" data-target="<?= $value['id'] ?>">Opret result</button>
            </div>
            <div class="col-3">
              <form action="<?= url('measurement-delete', ['measurement' => $value['id']]) ?>" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="address" value="<?= $address['id'] ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Er du sikker? Denne handling kan ikke fortrydes.');">
                  Slet&nbsp;
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </div>
          </div>
          <table class="table">
            <thead>
              <td class="text-center">Dato</td>
              <td class="text-center">Måling resultat (<?= $value['unit'] ?>)</td>
              <td class="text-center">Stigning</td>
              <td class="text-center">Stigning pr. dag</td>
            </thead>
            <tbody>
              <?php foreach ($value['result'] as $result) { ?>
                <tr>
                  <td class="text-center"><?= $result['date'] ?></td>
                  <td class="text-center">
                    <button class="btn btn-link" data-toggle="modal" data-target="<?= $result['id'] ?>"><?= $result['result'] ?> <?= $value['unit'] ?></button>
                  </td>
                  <!-- reads Increase-->
                  <td class="text-center"> <?= $result['increase'] ?> <?= $value['unit'] ?></td>
                  <td class="text-center"> <?= round($result['day'], 3) ?> <?= $value['unit'] ?> </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="col-6">
        <?= view('charts/line', ['measurements' => $value,]) ?>
        </div>
      </div>
    </div>
  </details>
<?php } ?>
<?= view('components/footer') ?>