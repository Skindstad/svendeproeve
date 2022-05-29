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
<?= view('modals/create', ['measurement' => $measurement, 'address' => $address]) ?>
<?= view('modals/update', ['results' => $results]) ?>
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
          <!-- maybe you  need to update measurement-->
          <!-- <div class="col align-self-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="new-result">opdater Måling</button>
          </div> -->
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
              <td class="text-center">Dato</td>
              <td class="text-center">Måling resultat (<?= $value['unit'] ?>)</td>
              <td class="text-center">Stigning</td>
              <td class="text-center">Stigning pr. dag</td>
            </thead>
            <tbody>
              <?php 
              $x = 0;
              foreach ($results as $result) {
                $x++;
                if ($result['measurement_id'] == $value['id']) { ?>
                  <tr>
                    <td class="text-center"><?= $result['date'] ?></td>
                    <td class="text-center">
                      <button class="btn btn-link" data-toggle="modal" data-target="<?= $result['id'] ?>"><?= $result['result'] ?> <?= $value['unit'] ?></button>
                    </td>
                    <td class="text-center">
                      <!-- reads Increase-->
                      <?php if( end($results)['id'] != $result['id']) {?>
                          <?= $result['result'] - $results[$x]['result'] ?> <?= $value['unit'] ?>
                       <?php }else { ?>
                        0 <?= $value['unit'] ?>
                        <?php } ?>
                    </td>
                    <!-- reads Increase pr day -->
                    <td class="text-center">
                      <?php if( end($results)['id'] != $result['id']) {?>
                          <?= $result['result'] - $results[$x]['result'] ?> <?= $value['unit'] ?>
                       <?php }else { ?>
                        0 <?= $value['unit'] ?>
                        <?php } ?>
                    </td>
                  </tr>
              <?php }} ?>
            </tbody>
          </table>
        </div>
        <div class="col-6"></div>
      </div>
    </div>
  </details>
<?php } ?>
<?= view('components/footer') ?>