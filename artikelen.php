<!DOCTYPE html>
<html>
<head>
    <title>Klanten</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
    <style>
        .scrollable-table {
            max-height: 600px;
            overflow-y: scroll;
        }
    </style>
</head>
<body>

<?php

require_once 'classes/artikel.php';
$artikel = new Artikel();

if (isset($_GET['artikelId'])) {
    $artikelId = $_GET['artikelId'];
    $artikel->verwijderArtikel($artikelId);
}

$artikelen = $artikel->getArtikelen();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Artikelen inzien</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Artikelen inzien</h2>

    <h3>Artikelen</h3>
    <div class="scrollable-table">
    <table>
        <thead>
            <tr>
                <th>Artikel ID</th>
                <th>Omschrijving</th>
                <th>Inkoop</th>
                <th>Verkoop</th>
                <th>Voorraad</th>
                <th>Minimale voorraad</th>
                <th>Maximale voorraad</th>
                <th>Locatie</th>
                <th>Leverancier</th>
                <th>Actie</th>
                <th>Bijwerken</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artikelen as $artikel) : ?>
                <tr>
                    <td><?php echo $artikel['artId']; ?></td>
                    <td><?php echo $artikel['artOmschrijving']; ?></td>
                    <td><?php echo $artikel['artInkoop']; ?></td>
                    <td><?php echo $artikel['artVerkoop']; ?></td>
                    <td><?php echo $artikel['artVoorraad']; ?></td>
                    <td><?php echo $artikel['artMinVoorraad']; ?></td>
                    <td><?php echo $artikel['artMaxVoorraad']; ?></td>
                    <td><?php echo $artikel['artLocatie']; ?></td>
                    <td><?php echo $artikel['levId']; ?></td>
                    <td>
                        <a href="artikelen.php?artikelId=<?php echo $artikel['artId']; ?>" class="delete-btn">Verwijderen</a>
                    </td>
                    <td>
                        <a href="artikel_update.php?artikelId=<?php echo $artikel['artId']; ?>" class="update-btn">Bijwerken</a> <!-- Nieuwe cel met de knop om naar de updatepagina te gaan -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
