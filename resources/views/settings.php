<?= view('components/header', ['title' => 'Indstilling']) ?>
<div class="sticky-alerts">
        <?= view('components/toasts') ?>
</div>
<?= view('components/navbar') ?>
<div class="row">
        <div class="col-1">
        </div>
        <div class="col-10 p-20">
                <form action="<?= url('user_update') ?>" method="post">
                        <input type="hidden" name="_method" value="PATCH" />
                        <input type="hidden" name="id" value="<?= $_SESSION['user']['id'] ?>">
                        <div class="form-group">
                                <label for="Brugernavn" class="required">Brugernavn:</label>
                                <input class="form-control" type="text" name="username" id="Brugeuserrnavn" value="<?= $_SESSION['user']['username'] ?>" required placeholder="Username">
                        </div>
                        <div class="form-group">
                                <label for="Brugernavn" class="required">Fornavn:</label>
                                <input class="form-control" type="text" name="firstname" id="firstname" value="<?= $_SESSION['user']['firstname'] ?>" required placeholder="Fornavn">
                        </div>
                        <div class="form-group">
                                <label for="Brugernavn" class="required">Efternavn:</label>
                                <input class="form-control" type="text" name="lastname" id="lastname" value="<?= $_SESSION['user']['lastname'] ?>" required placeholder="Efternavn">
                        </div>
                        <div class="form-group">
                                <label for="Brugernavn" class="required">Email:</label>
                                <input class="form-control" type="email" name="email" id="email" value="<?= $_SESSION['user']['email'] ?>" required placeholder="Email">
                        </div>
                        <div class="form-group">
                                <label for="Brugernavn" class="required"> Nuværende adgangskode:</label>
                                <input class="form-control" type="password" name="oldpassword" id="password" placeholder="Adgangskode">
                        </div>
                        <div class="form-group">
                                <label for="Brugernavn" class="required">Ny adgangskode:</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Gentag adgangskode">
                        </div>
                        <div class="form-group">
                                <label for="Brugernavn" class="required">Gentag adgangskode:</label>
                                <input class="form-control" type="password" name="repeatpassword" id="password" placeholder="Gentag adgangskode">
                        </div>
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary">Opdater</button>
                        </div>
                </form>
        </div>
        <div class="col-1"></div>
</div>

<?= view('components/footer') ?>