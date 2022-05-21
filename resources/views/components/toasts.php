<div class="alert alert-danger filled-dm" role="alert" id="validation-alert">
    <?php if (isset($_SESSION['errors'])) { ?>
        <p><?= implode('<br>', $_SESSION['errors']) ?></p>
    <?php } ?>
</div>

<div class="alert alert-success filled" role="alert" id="success-alert">
    <p>
        <?php
        if ($_SESSION['success'])
            echo $_SESSION['success'];
        ?>
    </p>
</div>