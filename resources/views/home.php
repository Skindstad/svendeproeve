<?= view('components/header', ['title' => 'Login'])?>
<?= view('components/navbar') ?>

<form action="/login" method="post">
    <div>
    <label for="">Brugernavn
        <input type="text" name="user" id="" placeholder="Brugernavn">
    </label>
    </div>
    <div>
    <label for="">Adgangskode
        <input type="password" name="pass" id="" placeholder="Adgangskode">
    </label>
    </div>
    <div>
        <button type="submit">Login</button>
    </div>
</form>

<?= view('components/footer') ?>