<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../partie_Accueil/accueil.css" rel="stylesheet">
    <link rel="stylesheet" media="screen and (max-width: 1024px)" href="../partie_Accueil/accueil_responsive.css">
    <title>M player</title>
</head>

<body>
    <?php
   session_start();
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("location: ../partie_Connexion/pageConnexionUser.php");
        exit;
    }
    $nom = $_SESSION['nom'];
    require_once'../DataBase/DataBase.php';
     include("../header/header_page.php");
     include("../body/body_page.php");
     include("../footer/footer_page.php");
   ?>


</body>

</html>
