<?php
session_start();
require_once '../DataBase/Database.php';
require_once '../DataBase/User.php';

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../partie_Connexion/pageConnexionUser.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log(print_r($_POST, true)); // Ajout de cette ligne pour déboguer

    $db = new Database();
    $user = new User($db->getPDO());

    $userId = $_SESSION['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $password = !empty($_POST['password']) ? $_POST['password'] : null;

    if ($user->Update_User($userId, $nom, $prenom, $email, $telephone, $password)) {
        $_SESSION['update_success'] = "Les informations ont été mises à jour avec succès.";
    } else {
        $_SESSION['update_error'] = "Une erreur est survenue lors de la mise à jour.";
    }
    
    header("location: ../partie_Accueil/accueil.php");
    exit;
}
?>
