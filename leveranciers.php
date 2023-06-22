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

require_once 'classes/levclass.php';
$leverancier = new Leverancier();

if (isset($_GET['leverancierId'])) {
    $leverancierId = $_GET['leverancierId'];
    $leverancier->verwijderLeverancier($leverancierId);
}

$leveranciers = $leverancier->getLeveranciers();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Leveranciers inzien</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Leveranciers inzien</h2>

    <h3>Leveranciers</h3>
    <div class="scrollable-table">
    <table>
        <thead>
            <tr>
                <th>Leverancier ID</th>
                <th>Naam</th>
                <th>Contactpersoon</th>
                <th>Email</th>
                <th>Adres</th>
                <th>Postcode</th>
                <th>Woonplaats</th>
                <th>Actie</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($leveranciers as $leverancier) : ?>
                <tr>
                    <td><?php echo $leverancier['levid']; ?></td>
                    <td><?php echo $leverancier['levnaam']; ?></td>
                    <td><?php echo $leverancier['levcontact']; ?></td>
                    <td><?php echo $leverancier['levEmail']; ?></td>
                    <td><?php echo $leverancier['levAdres']; ?></td>
                    <td><?php echo $leverancier['levPostcode']; ?></td>
                    <td><?php echo $leverancier['levWoonplaats']; ?></td>
                    <td>
                        <a href="leveranciers.php?leverancierId=<?php echo $leverancier['levid']; ?>" class="delete-btn">Verwijderen</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>
