<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1);
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "root");

$query = $db->query("SELECT * FROM matelas");
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<img src="../images/logo.png" alt="">
<div class="matelas-container">
    <?php
    foreach ($matelas as $matelasse) {
    ?>
        <div class="matelas">
            <h2>
                <img src="<?= $matelasse["image"] ?>" alt="">
                <p><?= $matelasse["marque"] ?></p>
                <p><?= $matelasse["nom"] ?></p>
                <p><?= $matelasse["taille"] ?></p>
                <p><?= $matelasse["prix"] ?>€</p>
            </h2>
        </div>
    <?php
    }
    ?>
</div>