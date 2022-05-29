<!-- Halfmoon JS -->
<script src="/script/halfmoon.min.js"></script>
<script src="/script/script.js"></script>

<script type="text/javascript">
    <?php if (isset($_SESSION['errors'])) { ?>
    halfmoon.toastAlert('validation-alert');
    <?php } ?>

    <?php if (isset($_SESSION['success'])) { ?>
    halfmoon.toastAlert('success-alert');
    <?php } ?>
</script>

<?php
// Clear all flashed session data
unset($_SESSION['errors']);
unset($_SESSION['success']);
?>
</body>
</html>