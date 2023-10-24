<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "root");

$query = $db->query("SELECT * FROM matelas");
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);

include("./templates/header.php");
?>

<div class="matelas-container">
    <?php
    foreach ($matelas as $matelasse) {
    ?>
        <div class="matelas">
            <h2>
                <img src="<?= $matelasse["image"] ?>" alt="">
                <p><?= $matelasse["marque"] ?></p>
                <p><?= $matelasse["name"] ?></p>
                <p><?= $matelasse["taille"] ?></p>
                <p><?= $matelasse["prix"] ?>€</p>
                <a href="modifyMatelas">Modifier les infos</a>
            </h2>
        </div>
    <?php
    }
    ?>
</div>