<?php
class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM Utilisateur WHERE ID = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function Update_User($id, $nom, $prenom, $mail, $telephone, $mot_de_passe = null) {
        $sql = "UPDATE Utilisateur SET Nom = :nom, Prenom = :prenom, Adresse_mail = :email, Numero_telephone = :telephone";
        if ($mot_de_passe) {
            $sql .= ", Mot_de_passe = :password";
        }
        $sql .= " WHERE ID = :id";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $mail);
        $stmt->bindParam(':telephone', $telephone);

        if ($mot_de_passe) {
            $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $hashed_password);
        }
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}
?>
