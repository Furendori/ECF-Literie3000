<?php
$dsn = "mysql:host=localhost;dbname=literie3000";
$db = new PDO($dsn, "root", "root");

$query = $db->query("SELECT * FROM matelas");
$matelas = $query->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $image = $_POST['image'];
    $marque = $_POST['marque'];
    $name = $_POST['name'];
    $taille = $_POST['taille'];
    $prix = $_POST['prix'];

    $dsn = "mysql:host=localhost;dbname=literie3000";
    $db = new PDO($dsn, "root", "root");
    $query = $db->prepare("UPDATE matelas SET image=?, marque=?, name=?, taille=?, prix=? WHERE id=:id");
    $query->execute([$image, $marque, $name, $taille, $prix]);
}
?>

<form action="" method="POST">
    <div class="form-group">
        <label for="inputName">Nom du matelas :</label>
        <input type="text" id="inputName" name="name" value="<?= isset($name) ? $name : "" ?>">
    </div>

    <div class="form-group">
        <label for="inputImage">Photo du matelas</label>
        <input type="text" name="image" id="inputImage" value="<?= isset($image) ? $image : "" ?>">
    </div>

    <div class="form-group">
        <label for="inputMarque">Marque du matelas :</label>
        <input type="text" name="marque" id="inputMarque" value="<?= isset($marque) ? $marque : "" ?>">
    </div>

    <div class="form-group">
        <label for="inputTaille">Taille du matelas :</label>
        <input type="text" name="taille" id="inputTaille" value="<?= isset($taille) ? $taille : "" ?>">
    </div>

    <div class="form-group">
        <label for="inputTaille">Prix du matelas :</label>
        <input type="text" name="prix" id="inputPrix" value="<?= isset($prix) ? $prix : "" ?>">
    </div>

    <input type="submit" value="Ajouter le matelas">