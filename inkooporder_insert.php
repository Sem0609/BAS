<?php
require_once 'classes/inkorderclass.php';

$inkOrder = new Inkooporder;

$leveranciers = $inkOrder->getLeveranciers();
$artikelen = $inkOrder->getArtikelen();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inkOrder->insertInkooporder($_POST['leverancierId'], $_POST['artId'], $_POST['inkOrdDatum'], $_POST['inkOrdBestAantal'], $_POST['inkOrdStatus']);
    header('Location: inkooporders.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inkooporder toevoegen</title>
</head>
<body>
    <h2>Inkooporder toevoegen</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="levId">Leverancier:</label>
        <select name="leverancierId" id="leverancierId">
            <?php foreach ($leveranciers as $leverancier) : ?>
                <option value="<?php echo $leverancier['levid']; ?>"><?php echo $leverancier['levnaam']; ?></option>
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
        <label for="inkOrdDatum">Inkooporder datum:</label>
        <input type="date" id="inkOrdDatum" name="inkOrdDatum" required>
        <br><br>
        <label for="inkOrdBestAantal">Inkooporder bestel aantal:</label>
        <input type="number" id="inkOrdBestAantal" name="inkOrdBestAantal" required>
        <br><br>
        <label for="inkOrdStatus">Inkooporder status:</label>
        <select name="inkOrdStatus" id="inkOrdStatus">
            <option value="0">In afwachting</option>
            <option value="1">In behandeling</option>
            <option value="2">Afgerond</option>
        </select><br><br>
        <input type="submit" name="submit" value="Toevoegen">
    </form>
</body>
</html>








































