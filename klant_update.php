<?php
require_once 'classes/userclass.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $klantId = $_POST['klantId'];
    $klantnaam = $_POST['klantnaam'];
    $klantEmail = $_POST['klantEmail'];
    $klantAdres = $_POST['klantAdres'];
    $klantPostcode = $_POST['klantPostcode'];
    $klantWoonplaats = $_POST['klantWoonplaats'];

    $user->setKlantnaam($klantnaam);
    $user->setKlantEmail($klantEmail);
    $user->setKlantAdres($klantAdres);
    $user->setKlantPostcode($klantPostcode);
    $user->setKlantWoonplaats($klantWoonplaats);

    $user->updateKlant($klantId, $user);

    header("Location: klanten.php");
    exit;
} else {
    if (isset($_GET['id'])) {
        $klantId = $_GET['id'];

        $klant = $user->zoekKlantOpId($klantId);

        if (!empty($klant)) {
            $klantnaam = $klant[0]['klantnaam'];
            $klantEmail = $klant[0]['klantEmail'];
            $klantAdres = $klant[0]['klantAdres'];
            $klantPostcode = $klant[0]['klantPostcode'];
            $klantWoonplaats = $klant[0]['klantWoonplaats'];
        } else {
            echo "Klant niet gevonden.";
            exit;
        }
    } else {
        echo "Klant-ID niet opgegeven.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Klant bijwerken</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Klant bijwerken</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="klantId" value="<?php echo $klantId; ?>">

        <label for="klantnaam">Klantnaam:</label>
        <input type="text" id="klantnaam" name="klantnaam" value="<?php echo $klantnaam; ?>" required><br>

        <label for="klantEmail">Klant E-mail:</label>
        <input type="email" id="klantEmail" name="klantEmail" value="<?php echo $klantEmail; ?>" required><br>

        <label for="klantAdres">Klant Adres:</label>
        <input type="text" id="klantAdres" name="klantAdres" value="<?php echo $klantAdres; ?>" required><br>

        <label for="klantPostcode">Klant Postcode:</label>
        <input type="text" id="klantPostcode" name="klantPostcode" value="<?php echo $klantPostcode; ?>" required><br>

        <label for="klantWoonplaats">Klant Woonplaats:</label>
        <input type="text" id="klantWoonplaats" name="klantWoonplaats" value="<?php echo $klantWoonplaats; ?>" required><br>

        <input type="submit" value="Bijwerken">
    </form>

    <a href="klanten.php" class="back-btn">Terug naar klantenpagina</a>
</body>
</html>
