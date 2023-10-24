<?php
if (isset($_POST["id"])) {
    $matelas_id = $_POST["id"];
}

if (!empty($_POST)) {
    $marque = trim(strip_tags($_POST["marque"]));
    $name = trim(strip_tags($_POST["name"]));
    $prix = trim(strip_tags($_POST["prix"]));
    $taille = trim(strip_tags($_POST["taille"]));
    $image = trim(strip_tags($_POST["image"]));

    $errors = [];

    var_dump($_FILES);
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES["image"]["tmp_name"];
        $fileName = $_FILES["image"]["name"];
        $fileType = $_FILES["image"]["type"];

        $fileNameArray = explode(".", $fileName);
        $fileExtension = end($fileNameArray);

        $newFileName = md5($fileName . time()) . "." . $fileExtension;

        $fileDestPath = "./images/{$newFileName}";

        $allowedTypes = array("image/jpeg", "image/png", "image/webp");

        if (in_array($fileType, $allowedTypes)) {
            move_uploaded_file($fileTmpPath, $fileDestPath);
        } else {
            $errors["image"] = "Le type de fichier est incorrect (.jpg, .png ou .webp requis)";
        }
    }

    if (empty($errors)) {
        $dsn = "mysql:host=localhost;dbname=literie3000";
        $db = new PDO($dsn, "root", "root");

        $query = $db->prepare("UPDATE matelas (marque, name, prix, taille, image) SET (:marque, :name, :prix, :taille, :image) where id = :id");
        $query->bindParam(":marque", $marque);
        $query->bindParam(":name", $name);
        $query->bindParam(":prix", $prix);
        $query->bindParam(":taille", $taille);
        $query->bindParam(":image", $image);

        if ($query->execute()) {
            header("Location: index.php");
        } else {
            var_dump($query->errorInfo());
        }
    }
}
?>

<form action="" method="POST">
    
    <input type="hidden" name="matress_id" value="<?= $id ?>">

    <div class="form-group">
        <label for="inputName">Nom du matelas :</label>
        <input type="text" id="inputName" name="name">
    </div>

    <div class="form-group">
        <label for="inputImage">Photo du matelas</label>
        <input type="text" name="image" id="inputImage">
    </div>

    <div class="form-group">
        <label for="inputMarque">Marque du matelas :</label>
        <input type="text" name="marque" id="inputMarque" value="<?= $matelas['marque'] ?>">
    </div>

    <div class="form-group">
        <label for="inputTaille">Taille du matelas :</label>
        <input type="text" name="taille" id="inputTaille" value="<?= $matelas['id'] ?>">
    </div>

    <div class="form-group">
        <label for="inputTaille">Prix du matelas :</label>
        <input type="text" name="prix" id="inputPrix" value="<?= $matelas['id'] ?>">
    </div>

    <input type="submit" value="Modifier le matelas">