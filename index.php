<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/index.css">
</head>
<body>
    <h1>Menu</h1>
    <ul class="menu">
        <li class="main">
            Klant beheren
            <ul>
                <li><a href="klant_insert.php">Klant toevoegen</a></li>
                <li><a href="klanten.php">Klant zien</a></li>
            </ul>
        </li>
        <li class="main">
            Artikel beheren
            <ul>
                <li><a href="artikel_toevoegen.php">Artikel toevoegen</a></li>
                <li><a href="artikelen.php">Artikel zien</a></li>
            </ul>
        </li>
        <li class="main">
            Leveranciers beheren
            <ul>
                <li><a href="leverancier_toevoegen.php">Leverancier toevoegen</a></li>
                <li><a href="leveranciers.php">Leverancier zien</a></li>
            </ul>
        </li>
    </ul><br>
    <ul class="menu">
        <li class="main">
            In-/Verkoop orders beheren
            <ul>
                <li><a href="verkooporder_insert.php">Verkoop aanmaken</a></li>
                <li><a href="verkooporders.php">Verkoop zien</a></li>
            </ul>
        </li>
        <li class="main">
             <br>
            <ul>
                <li><a href="inkooporder_insert.php">Inkoop aanmaken</a></li>
                <li><a href="inkooporders.php">Inkoop zien</a></li>
            </ul>
        </li>
    </ul>
</body>
</html>