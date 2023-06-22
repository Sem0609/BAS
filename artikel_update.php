<?php

require_once 'classes/artikel.php';
$artikel = new Artikel();

if (isset($_GET['artikelId'])) {
    $artikelId = $_GET['artikelId'];
    $artikelData = $artikel->getArtikel($artikelId);

    if ($artikelData) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $artOmschrijving = $_POST['artOmschrijving'];
            $artInkoop = $_POST['artInkoop'];
            $artVerkoop = $_POST['artVerkoop'];
            $artVoorraad = $_POST['artVoorraad'];
            $artMinVoorraad = $_POST['artMinVoorraad'];
            $artMaxVoorraad = $_POST['artMaxVoorraad'];
            $artLocatie = $_POST['artLocatie'];
            $levId = $_POST['levId'];

            $artikel->updateArtikel($artikelId, $artOmschrijving, $artInkoop, $artVerkoop, $artVoorraad, $artMinVoorraad, $artMaxVoorraad, $artLocatie, $levId);
            
            header("Location: artikelen.php");
            exit();
        }
    } else {
        header("Location: artikelen.php");
        exit();
    }
} else {
    header("Location: artikelen.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Artikel bijwerken</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Artikel bijwerken</h2>

    <form method="POST" action="">
        <label for="artOmschrijving">Omschrijving:</label>
        <input type="text" name="artOmschrijving" value="<?php echo $artikelData['artOmschrijving']; ?>" required><br>

        <label for="artInkoop">Inkoopprijs:</label>
        <input type="text" name="artInkoop" value="<?php echo $artikelData['artInkoop']; ?>" required><br>

        <label for="artVerkoop">Verkoopprijs:</label>
        <input type="text" name="artVerkoop" value="<?php echo $artikelData['artVerkoop']; ?>" required><br>

        <label for="artVoorraad">Voorraad:</label>
        <input type="text" name="artVoorraad" value="<?php echo $artikelData['artVoorraad']; ?>" required><br>

        <label for="artMinVoorraad">Minimale voorraad:</label>
        <input type="text" name="artMinVoorraad" value="<?php echo $artikelData['artMinVoorraad']; ?>" required><br>

        <label for="artMaxVoorraad">Maximale voorraad:</label>
        <input type="text" name="artMaxVoorraad" value="<?php echo $artikelData['artMaxVoorraad']; ?>" required><br>

        <label for="artLocatie">Locatie:</label>
        <input type="text" name="artLocatie" value="<?php echo $artikelData['artLocatie']; ?>" required><br>

        <label for="levId">Leverancier:</label>
        <input type="text" name="levId" value="<?php echo $artikelData['levId']; ?>" required><br>

        <input type="submit" value="Bijwerken">
    </form>
    <a href="artikelen.php" class="back-btn">Terug naar artikelen</a>
</body>
</html>
