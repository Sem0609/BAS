<?php
require_once 'classes/userclass.php';

if (isset($_POST["submit"])) {
    $klantnaam = $_POST['klantnaam'];
    $klantEmail = $_POST['klantEmail'];
    $klantAdres = $_POST['klantAdres'];
    $klantPostcode = $_POST['klantPostcode'];
    $klantWoonplaats = $_POST['klantWoonplaats'];

    if (strlen($klantnaam) < 3) {
        echo "De klantnaam moet minimaal 3 karakters bevatten.";
        exit();
    }

    $user = new User();

    $user->setKlantnaam($klantnaam);
    $user->setKlantEmail($klantEmail);
    $user->setKlantAdres($klantAdres);
    $user->setKlantPostcode($klantPostcode);
    $user->setKlantWoonplaats($klantWoonplaats);

    $result = $user->addUser();

    if ($result) {
        echo "De klant is succesvol toegevoegd aan de database.";
    } else {
        echo "Er bestaat al een klant met dezelfde naam in de database.";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nieuwe klant toevoegen</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
    </head>
    <body>
        <h1>Nieuwe klant toevoegen</h1>
        <form method="POST" action="">
            <label for="klantnaam">Klantnaam:</label>
            <input type="text" id="klantnaam" name="klantnaam" required><br>

            <label for="klantEmail">Email:</label>
            <input type="email" id="klantEmail" name="klantEmail" required><br>

            <label for="klantAdres">Adres:</label>
            <input type="text" id="klantAdres" name="klantAdres" required><br>

            <label for="klantPostcode">Postcode:</label>
            <input type="text" id="klantPostcode" name="klantPostcode" required><br>

            <label for="klantWoonplaats">Woonplaats:</label>
            <input type="text" id="klantWoonplaats" name="klantWoonplaats" required><br>

            <input type="submit" name="submit" value="Toevoegen">
        </form>
        <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
    </body>
</html>
