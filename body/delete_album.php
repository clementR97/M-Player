<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../partie_Connexion/pageConnexionUser.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];

    $dsn = 'mysql:host=localhost;dbname=Music_player';
    $username = 'root';
    $password = 'root';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Supprime l'album de la table Musique
        $stmt = $pdo->prepare("DELETE FROM Musique WHERE ID = :id");
        $stmt->bindParam(':id', $albumId, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: ../partie_Accueil/accueil.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
} else {
    echo "ID d'album non spécifié.";
}
?>
