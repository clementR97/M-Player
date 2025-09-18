<?php
 

//   require_once 'Database.php';
 require_once 'User.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../partie_Connexion/pageConnexionUser.php");
    exit;
}

// Obtenir l'ID de l'utilisateur depuis la session
 $userId = $_SESSION['id'];

 $db = new Database();
 $user = new User($db->getPDO());

// // Récupérer les informations de l'utilisateur
 $userInfo = $user->getUserById($userId);

 $nom = $userInfo['Nom'] ?? ''; // Utilisez l'opérateur null coalescent pour définir une valeur par défaut
 $prenom = $userInfo['Prenom'] ?? '';
 $email = $userInfo['Adresse_mail'] ?? '';
 $telephone = $userInfo['Numero_telephone'] ?? '';

?>
