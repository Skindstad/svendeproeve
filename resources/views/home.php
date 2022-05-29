<?= view('components/header', ['title' => 'Home']) ?>
<div class="sticky-alerts">
    <?= view('components/toasts') ?>
</div>
<?= view('components/navbar') ?>
<div class="row mt-20 pt-20">
    <div class="col-6">
        <div class="card">
            <h2 class="card-title">Login</h2>
            <form action="<?= url('login') ?>" method="post">
                <div class="form-group">
                    <label for="Brugernavn" class="required">Brugernavn:</label>
                    <input class="form-control" type="text" name="username" id="user" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="Adgangskode" class="required">Adgangskode:</label>
                    <input class="form-control" type="password" name="password" id="pass" placeholder="Adgangskode">
                </div>
                <div class="row">
                    <div class="col">
                        <a href="/"><b>Forgot my password</b></a>
                    </div>
                    <div class="col">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary" value="Login">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <h2 class="card-title">Signup</h2>
            <form action="<?= url('signup') ?>" method="post">
                <div class="form-group">
                    <label for="Brugernavn" class="required">Brugernavn:</label>
                    <input class="form-control" type="text" name="username" id="" placeholder="Brugernavn">
                </div>
                <div class="form-group">
                    <label for="Fornavn" class="required">Fornavn:</label>
                    <input class="form-control" type="text" name="firstname" id="" placeholder="Fornavn">
                </div>
                <div class="form-group">
                    <label for="Efternavn" class="required">Efternavn:</label>
                    <input class="form-control" type="text" name="lastname" id="" placeholder="Efternavn" >
                </div>
                <div class="form-group">
                    <label for="Adgangskode" class="required">Adgangskode:</label>
                    <input class="form-control" type="password" name="password" id="" placeholder="Adgangskode">
                </div>
                <div class="form-group">
                    <label for="Gentag Adgangskode" class="required">Gentag Adgangskode:</label>
                    <input class="form-control" type="password" name="repeatpassword" id="" placeholder="Gentag Adgangskode">
                </div>
                <div class="form-group">
                    <label for="Email" class="required">Email:</label>
                    <input class="form-control" type="email" name="email" id="" placeholder="Email">
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit">Sign-up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= view('components/footer') ?>