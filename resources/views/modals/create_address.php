<?php

/**
 * * @var array $users
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
  </div>
</div>