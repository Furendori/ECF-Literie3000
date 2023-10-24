<?php
$page = "home";
if (isset($_GET["page"])) {
    $page = $_GET["page"];
}

require("../config/index.php");

$dsn = "mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE;
$db = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

$pages = array(
    "home" => array(
        "model" => "HomeModel",
        "view" => "HomeView",
        "controller" => "HomeController"
    ),
);

// On parcourt le tableau pour vérifier si la page existe réellement
$find = false;
foreach ($pages as $key => $value) {
    if ($page === $key) {
        // Nous avons trouvé la bonne page à générer
        $find = true;

        $model = $value["model"];
        $view = $value["view"];
        $controller = $value["controller"];
    }
}

if ($find) {
    // On importe les diférentes classes (ex: HomeModel, HomeController et HomeView)
    require(DIR_MODEL . $page . ".php");
    require(DIR_CONTROLLER . $page . ".php");
    require(DIR_VIEW . $page . ".php");

    // Suitr à l'import nous avons la possibilité d'instancier les classes importées
    $pageModel = new $model($db);
    $pageController = new $controller($pageModel);
    $pageView = new $view($pageController);

    // Appel à la mémoire render() pour faire le rendu de la vue
    $pageView->render();
}