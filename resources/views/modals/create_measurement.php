<?php

/**
 * * @var array $address
 * @var array $measurement
 * @var array $result
 */
?>
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
  </div>
</div>