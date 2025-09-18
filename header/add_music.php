<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dsn = 'mysql:host=localhost;dbname=Music_player';
    $username = 'root';
    $password = 'root';
    session_start();
    try {
        // Créer une connexion PDO
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les données du formulaire
        $titre = htmlspecialchars($_POST['titre'],ENT_QUOTES,'UTF-8');
        $description = htmlspecialchars($_POST['description'],ENT_QUOTES,'UTF-8');
        $style_music = htmlspecialchars($_POST['genre_musique'],ENT_QUOTES,'UTF-8');
        $ID_Nom = $_SESSION['id'];

        // Gérer le téléchargement de l'image

        $image_dir = '../partie_Accueil/uploads/images/';
        $image_file_name = basename($_FILES["image"]["name"]);
        $image_file_ext = pathinfo($image_file_name, PATHINFO_EXTENSION);
        $unique_image_file_name = uniqid('img_', true) . '.' . $image_file_ext;
        $image_file = $image_dir . $unique_image_file_name;
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image_file)) {
            throw new Exception("Échec du téléchargement de l'image.");
        }

        // Gérer le téléchargement du fichier MP3

        $mp3_dir = '../partie_Accueil/uploads/mp3/';
        $mp3_file_name = basename($_FILES["mp3"]["name"]);
        $mp3_file_ext = pathinfo($mp3_file_name, PATHINFO_EXTENSION);
        $unique_mp3_file_name = uniqid('mp3_', true) . '.' . $mp3_file_ext;
        $mp3_file = $mp3_dir . $unique_mp3_file_name;
        if (!move_uploaded_file($_FILES["mp3"]["tmp_name"], $mp3_file)) {
            throw new Exception("Échec du téléchargement du fichier MP3.");
        }
        

        // la partie pour la date d'ajout
        $date_Ajout = date('Y-m-d H:i:s');
        

        // Préparer et exécuter la requête SQL pour insérer une nouvelle chanson
        $sql = "INSERT INTO Musique (Nom_Album, Date_Ajout, Description, Lien_musique, Style_musique, Lien_Image_Album) VALUES (:titre, :date_d_ajout, :description, :fichier_mp3, :style, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindParam(':date_d_ajout', $date_Ajout, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':fichier_mp3', $mp3_file, PDO::PARAM_STR);
        $stmt->bindParam(':style', $style_music, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image_file, PDO::PARAM_STR);
        $stmt->execute();

        // Récupérer l'ID de la nouvelle chanson insérée
        $musicId = $pdo->lastInsertId();

        // Insérer une entrée dans la table de jointure Users_Music
         $sql1 = "INSERT INTO Users_Music (ID_Users, ID_Musics) VALUES (:user_id, :music_id)";
         $stmt = $pdo->prepare($sql1);
        $stmt->bindParam(':user_id', $ID_Nom, PDO::PARAM_INT);
         $stmt->bindParam(':music_id', $musicId, PDO::PARAM_INT);
        $stmt->execute();

        echo "Chanson enregistrée avec succès!";
        header('location:../partie_Accueil/accueil.php');
    } catch (PDOException $e) {
        echo "Erreur PDO: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
?>











 <!-- // $image_dir = '../partie_Accueil/uploads/images/';
        // $image_file = $image_dir . basename($_FILES["image"]["name"]);
        // if (!move_uploaded_file($_FILES["image"]["tmp_name"], $image_file)) {
        //     throw new Exception("Échec du téléchargement de l'image.");
        // }
        // $mp3_dir = '../partie_Accueil/uploads/mp3/';
        // $mp3_file = $mp3_dir . basename($_FILES["mp3"]["name"]);
        // if (!move_uploaded_file($_FILES["mp3"]["tmp_name"], $mp3_file)) {
        //     throw new Exception("Échec du téléchargement du fichier MP3.");
        // } -->