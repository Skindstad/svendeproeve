<?php

/**
 * * @var array $users
 * * @var array $results
 */
?>
<?php foreach ($results as $result) { ?>
  <div class="modal" id="<?= $result['id'] ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content p-20">
        <a href="#" class="close" role="button" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
        <h5 class="modal-title">Opdater resultat</h5>
        <form action="<?= url('result-update') ?>" method="post">
          <input type="hidden" name="_method" value="PATCH" />
          <input class="form-control" type="hidden" name="id" value="<?= $result['id'] ?>">
          <div class="form-group">
            <label for="" class="required">Resultat:</label>
            <input class="form-control" type="text" name="result" value="<?= $result['result'] ?>" placeholder="Resultat">
          </div>
          <div class="form-group">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Opdater</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php } ?>