<?php

require_once 'classes/userclass.php';
require_once 'classes/verkorderclass.php';

$user = new User();
$verkooporder = new Verkooporder();

$klanten = $user->getKlanten();

$artikelen = $user->getArtikelen();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['klantId'], $_POST['artId'], $_POST['verkOrdDatum'], $_POST['verkOrdStatus'], $_POST['verkOrdBestAantal'])) {
        $verkooporder->setKlantId($_POST['klantId']);
        $verkooporder->setArtId($_POST['artId']);
        $verkooporder->setVerkOrdDatum($_POST['verkOrdDatum']);
        $verkooporder->setVerkOrdBestAantal($_POST['verkOrdBestAantal']);
        $verkooporder->setVerkOrdStatus($_POST['verkOrdStatus']);

        $verkooporder->addVerkooporder();

        echo "Verkooporder succesvol toegevoegd!";
    } else {
        echo "Niet alle vereiste velden zijn ingevuld!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verkooporder aanmaken</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Verkooporder aanmaken</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="klantId">Klant:</label>
        <select name="klantId" id="klantId">
            <?php foreach ($klanten as $klant) : ?>
                <option value="<?php echo $klant['klantid']; ?>"><?php echo $klant['klantnaam']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="artId">Artikel:</label>
        <select name="artId" id="artId">
            <?php foreach ($artikelen as $artikel) : ?>
                <option value="<?php echo $artikel['artId']; ?>"><?php echo $artikel['artOmschrijving']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="verkOrdDatum">Verkooporder datum:</label>
        <input type="date" id="verkOrdDatum" name="verkOrdDatum" required>
        <br><br>
        <label for="verkOrdBestAantal">Verkooporder bestel aantal:</label>
        <input type="number" id="verkOrdBestAantal" name="verkOrdBestAantal" required>
        <br><br>
        <label for="verkOrdStatus">Verkooporder status:</label>
        <select name="verkOrdStatus" id="verkOrdStatus">
            <option value="0">In afwachting</option>
            <option value="1">In behandeling</option>
            <option value="2">Afgerond</option>
        </select><br><br>
        <input type="submit" name="submit" value="Toevoegen">
    </form>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
