<?php
require_once 'vendor/autoload.php';
require_once '.env';
session_start();

$client = new Google_Client();
$client->setClientId(clientId);
$client->setClientSecret(clientSecret);
$client->setRedirectUri(RedictUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    // Récupérer les informations de l'utilisateur
    $oauth2 = new Google\Service\Oauth2($client);
    $userInfo = $oauth2->userinfo->get();

    $email = $userInfo->email;
    $firstName = $userInfo->givenName;
    $lastName = $userInfo->familyName;
    var_dump($userInfo);
    // Connexion à la base de données
    $dsn = 'mysql:host=localhost;dbname=Music_player';
    $username = 'root';
    $password = 'root';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si l'utilisateur existe déjà
        $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE Adresse_mail = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // Insérer l'utilisateur dans la base de données
            $stmt = $pdo->prepare("INSERT INTO Utilisateur (Nom, Prenom, Adresse_mail) VALUES (:lastName, :firstName, :email)");
            $stmt->bindParam(':lastName', $lastName);
            $stmt->bindParam(':firstName', $firstName);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $userId = $pdo->lastInsertId();
        } else {
            $userId = $user['ID'];
        }

        // Stocker les informations de l'utilisateur dans la session
        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $userId;
        $_SESSION['nom'] = $firstName;

        header("Location: ../partie_Accueil/accueil.php");
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    header('Location: ../partie_Connexion/pageConnexionUser.php');
    exit;
}
?>
