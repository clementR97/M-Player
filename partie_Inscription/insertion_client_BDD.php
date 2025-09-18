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

        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $date_naissance = $_POST['Date_de_naissance'];
        $adresse_mail = $_POST['e-mail'];
        $numero_telephone = $_POST['telephone'];
        $mot_de_passe = $_POST['mot_de_passe'];

        $sql_check_email = "SELECT id FROM Utilisateur WHERE Adresse_mail = :adresse_mail";
        $stmt_check_email = $pdo->prepare($sql_check_email);
        $stmt_check_email->bindParam(':adresse_mail', $adresse_mail, PDO::PARAM_STR);
        $stmt_check_email->execute();
        if ($stmt_check_email->rowCount() > 0) {
            echo "Cette adresse e-mail est déjà utilisée.";
        }else{
        // Hacher le mot de passe
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Préparer et exécuter la requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO Utilisateur (Nom, Prenom, Date_de_naissance, Adresse_mail, Numero_telephone, Mot_de_passe) VALUES (:nom, :prenom,:date_naissance, :adresse_mail, :numero_telephone, :mot_de_passe)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':adresse_mail', $adresse_mail, PDO::PARAM_STR);
        $stmt->bindParam(':numero_telephone', $numero_telephone, PDO::PARAM_STR);
        $stmt->bindParam(':mot_de_passe', $hashed_password, PDO::PARAM_STR);
        $stmt->execute();
        //teste
        $sql1="SELECT * FROM Utilisateur WHERE Adresse_mail = :adresse_mail";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindParam(':adresse_mail', $adresse_mail, PDO::PARAM_STR);
        $stmt1->execute();
        $user = $stmt1->fetch(PDO::FETCH_ASSOC);
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['ID'];
                $_SESSION['adresse_mail'] = $user['Adresse_mail'];
                $_SESSION['nom'] = $user['Nom'];
        //
        echo "Inscription réussie!";
        header("location:../partie_Accueil/accueil.php");
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>
