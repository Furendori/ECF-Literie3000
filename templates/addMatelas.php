<?php
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

        $query = $db->prepare("INSERT INTO matelas (marque, name, prix, taille, image) VALUES (:marque, :name, :prix, :taille, :image)");
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
<h1>Ajouter un matelas</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputName">Nom du matelas :</label>
        <input type="text" id="inputName" name="name" value="<?= isset($name) ? $name : "" ?>">
        <?php
        if (isset($errors["name"])) {
        ?>
            <span class="info-error"><?= $errors["name"] ?></span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputImage">Photo du matelas</label>
        <input type="text" name="image" id="inputImage" value="<?= isset($image) ? $image : "" ?>">
        <?php
        if (isset($errors["image"])) {
        ?>
            <span class="info-error"><?= $errors["image"] ?></span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputMarque">Marque du matelas :</label>
        <input type="text" name="marque" id="inputMarque" value="<?= isset($marque) ? $marque : "" ?>">
        <?php
        if (isset($errors["marque"])) {
        ?>
            <span class="info-error"><?= $errors["marque"] ?></span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputTaille">Taille du matelas :</label>
        <input type="text" name="taille" id="inputTaille" value="<?= isset($taille) ? $taille : "" ?>">
        <?php
        if (isset($errors["taille"])) {
        ?>
            <span class="info-error"><?= $errors["taille"] ?></span>
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="inputTaille">Prix du matelas :</label>
        <input type="text" name="prix" id="inputPrix" value="<?= isset($prix) ? $prix : "" ?>">
        <?php
        if (isset($errors["prix"])) {
        ?>
            <span class="info-error"><?= $errors["prix"] ?></span>
        <?php
        }
        ?>
    </div>

    <input type="submit" value="Ajouter le matelas">
</form>