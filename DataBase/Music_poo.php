<?php
class Music{
    private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
                }


                public function getMusicByID($id_album){
                    $sql = "SELECT * FROM Musique WHERE ID = :id";
                    $stmt = $this->pdo->prepare($sql);
                    $stmt->bindParam(':id', $id_album, PDO::PARAM_INT);
                    $stmt->execute();
                    return $stmt->fetch(PDO::FETCH_ASSOC);
                }
    }
?>