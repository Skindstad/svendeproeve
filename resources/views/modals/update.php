<?php

/**
 * * @var array $users
 * * @var array $address
 * * @var array $measurements
 */
?>
<?php foreach ($measurements as $value) { ?>
<div class="modal" id="<?= $value['id'] ?>" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-20">
      <a href="#" class="close" role="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </a>
      <h5 class="modal-title">Opret resultat</h5>
      <form action="<?= url('result-create') ?>" method="post">
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
<?php foreach ($measurements as $value) { 
  foreach($value['result'] as $result){?>
  <div class="modal" id="<?= $result['id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-20">
        <a href="#" class="close" role="button" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        <h5 class="modal-title">Opdater resultat</h5>
        <form action="<?= url('result-update')?>" method="post">
          <input type="hidden" name="_method" value="PATCH" />
          <input type="hidden" name="id" value="<?= $result['id'] ?>" />
          <input type="hidden" name="address" value="<?= $address['id'] ?>" />
          <div class="form-group">
            <label for="" class="required">Resultat:</label>
            <input class="form-control" type="text" name="result" value="<?= $result['result'] ?>" placeholder="Resultat">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Opdater</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php }} ?>