<?php

require_once 'classes/userclass.php';
require_once 'classes/verkorderclass.php';

$user = new User();
$verkooporder = new Verkooporder();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verkOrdId = $_POST['verkOrdId'];
    $verkOrdStatus = $_POST['verkOrdStatus'];

    $verkooporder->updateVerkooporderStatus($verkOrdId, $verkOrdStatus);
}

if (isset($_GET['verkOrdId'])) {
    $verkOrdId = $_GET['verkOrdId'];
    $verkooporder->verwijderVerkooporder($verkOrdId);
}

$verkooporders = $verkooporder->getVerkooporders();

$klanten = $user->getKlanten();

$artikelen = $user->getArtikelen();

foreach ($verkooporders as &$order) {
    $klantId = $order['klantId'];
    $artId = $order['artId'];

    $klant = $klanten[array_search($klantId, array_column($klanten, 'klantid'))];
    $order['klantnaam'] = $klant['klantnaam'];

    $artikel = $artikelen[array_search($artId, array_column($artikelen, 'artId'))];
    $order['artOmschrijving'] = $artikel['artOmschrijving'];
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Verkooporders inzien</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h2>Verkooporders inzien</h2>

    <h3>Verkooporders</h3>
    <table>
    <thead>
        <tr>
            <th>Verkooporder ID</th>
            <th>Klant</th>
            <th>Artikel</th>
            <th>Datum</th>
            <th>Status</th>
            <th>Bestel aantal</th>
            <th>Actie</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($verkooporders as $verkooporder) : ?>
            <tr>
                <td><?php echo $verkooporder['verkOrdId']; ?></td>
                <td>(<?php echo $verkooporder['klantId']; ?>) <?php echo $verkooporder['klantnaam']; ?></td>
                <td>(<?php echo $verkooporder['artId']; ?>) <?php echo $verkooporder['artOmschrijving']; ?></td>
                <td><?php echo $verkooporder['verkOrdDatum']; ?></td>
                <td><?php echo $verkooporder['verkOrdStatus']; ?></td>
                <td><?php echo $verkooporder['verkOrdBestAantal']; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="verkOrdId" value="<?php echo $verkooporder['verkOrdId']; ?>">
                        <select name="verkOrdStatus">
                            <option value="0" <?php echo ($verkooporder['verkOrdStatus'] == '0') ? 'selected' : ''; ?>>In behandeling</option>
                            <option value="1" <?php echo ($verkooporder['verkOrdStatus'] == '1') ? 'selected' : ''; ?>>Verzonden</option>
                            <option value="2" <?php echo ($verkooporder['verkOrdStatus'] == '2') ? 'selected' : ''; ?>>Geleverd</option>
                        </select>
                        <input type="submit" value="Bijwerken">
                    </form>
                    <a href="verkooporder_update.php?verkOrdId=<?php echo $verkooporder['verkOrdId']; ?>">Bijwerken</a>
                    <a href="verkooporders.php?verkOrdId=<?php echo $verkooporder['verkOrdId']; ?>" onclick="return confirm('Weet je zeker dat je deze verkooporder wilt verwijderen?')">Verwijderen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <a href="index.php" class="back-btn">Terug naar hoofdmenu</a>
</body>
</html>