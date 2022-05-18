<?= view('components/header', ['title' => 'Sign up'])?>
<?= view('components/navbar') ?>

<form action="" method="post">
    <div>
    <label for="">Brugernavn
        <input type="text" name="user" id="" placeholder="Brugernavn">
    </label>
    </div>
     <div>
    <label for="">Fornavn
        <input type="text" name="first" id="" placeholder="Fornavn">
    </label>
    </div>
    <div>
    <label for="">Efternavn
        <input type="text" name="last" id="" placeholder="Efternavn">
    </label>
    </div>
    <div>
    <label for="">Adgangskode
        <input type="password" name="pass" id="" placeholder="Adgangskode">
    </label>
    </div>
    <div>
    <label for="">Gentag Adgangskode
        <input type="password" name="gpass" id="" placeholder="Gentag Adgangskode">
    </label>
    </div>
    <div>
    <label for="">Email
        <input type="email" name="email" id="" placeholder="Email">
    </label>
    </div> 
    <div>
        <button type="submit">sign-up</button>
    </div>
</form>

<?= view('components/footer') ?>