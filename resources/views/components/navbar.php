<?php

use App\Auth;

?>
<nav class="navbar">
    <div class="container-md">
        <?php if (Auth::guard('user', 'admin', 'maintenance')) { ?>
            <a href="#" class="navbar-brand"><?= $_SESSION['user']['firstname'] ?> <?= $_SESSION['user']['lastname'] ?></a>
            <?php } ?>
            <div class="navbar-content ml-auto">
            <?php if (Auth::guard('admin', 'maintenance')) { ?>
                <div class="dropdown with-arrow">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        Admin&nbsp;&nbsp;
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php if (Auth::guard('admin')) { ?>
                            <a href="#" class="dropdown-item">
                                Bruger oversigt
                            </a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <?php if (Auth::guard('user', 'admin', 'maintenance')) { ?>
                <ul class="navbar-nav d-none d-sm-flex ml-0">
                    <li class="nav-item <?= activateLink('address') ?>"><a class="nav-link" href="<?= url('address') ?>">Adresse</a></li>
                    <li class="nav-item <?= activateLink('settings') ?>"><a class="nav-link" href="<?= url('settings') ?>">Instilling</a></li>
                    <li class="nav-item <?= activateLink('signout') ?>"><a class="nav-link" href="<?= url('signout') ?>">Logout</a></li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>