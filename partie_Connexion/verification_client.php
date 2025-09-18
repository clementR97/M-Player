<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dsn = 'mysql:host=localhost;dbname=Music_player';
    $username = 'root';
    $password = 'root';

    try {
        // Créer une connexion PDO
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $adresse_mail = $_POST['e_mail'];
        $mot_de_passe = $_POST['mot_de_passe'];

        // Préparer et exécuter la requête SQL
        $sql = "SELECT * FROM Utilisateur WHERE Adresse_mail = :adresse_mail";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':adresse_mail', $adresse_mail, PDO::PARAM_STR);
        $stmt->execute();

        // Vérifier si l'utilisateur existe
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifier le mot de passe
            if (password_verify($mot_de_passe, $user['Mot_de_passe'])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['ID'];
                $_SESSION['adresse_mail'] = $user['Adresse_mail'];
                $_SESSION['nom'] = $user['Nom'];
                echo "Connexion réussie!";
                header("location:../partie_Accueil/accueil.php");
            } else {
                echo "Mot de passe incorrect.";
            }
        } else {
            echo "Adresse e-mail n'existe pas.";
     }
     } 
    catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
