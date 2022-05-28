<?php

/**
 * * @var array $address
 * @var array $measurement
 */
?>
<div class="modal" id="new-result" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content p-20">
      <a href="#" class="close" role="button" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </a>
      <h5 class="modal-title">Opret resultat</h5>
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
  </div>
</div>