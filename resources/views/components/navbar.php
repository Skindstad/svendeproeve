<?php

use App\Auth;

?>
<div >
    <ul class="navbar-nav d-none d-md-flex">
        <?php if (Auth::guard('guest')) { ?>
            <li class="nav-item <?= activateLink('home') ?>"><a href="<?= url('home') ?>" class="nav-link">Login</a></li>
        <?php } ?>
        <!-- After you have log in -->
        <?php if (Auth::guard('user')) { ?>
            <li class="nav-item <?= activateLink('address') ?>"><a class="nav-link" href="<?= url('address') ?>">Adresse</a></li>
            <li class="nav-item <?= activateLink('settings') ?>"><a class="nav-link" href="/">Instilling</a></li>
            <li class="nav-item <?= activateLink('signout') ?>"><a class="nav-link" href="<?= url('signout') ?>">Logout</a></li>
        <?php } ?>
    </ul>
</div>