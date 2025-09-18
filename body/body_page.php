<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: ../partie_Connexion/verification_client.php");
    exit;
}

$ID_Nom = $_SESSION['id']; // Supposons que l'ID de l'utilisateur est stocké dans la session

$dsn = 'mysql:host=localhost;dbname=Music_player';
$username = 'root';
$password = 'root';

try {
    // Créer une connexion PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les albums ajoutés par l'utilisateur
    $sql = "SELECT * FROM Musique
            JOIN Users_Music ON Musique.ID = Users_Music.ID_Musics
            WHERE Users_Music.ID_Users = :userId";
   
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $ID_Nom, PDO::PARAM_INT);
    $stmt->execute();
    
    $albums = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}

?>
<link href="../header/modal.css" rel="stylesheet">
<script src="../header/modal.js"></script>

<div id="album_body">
    <h1>Mes Albums</h1>
    <?php if (!empty($albums)): ?>
        <div class="albums-container">
            <?php foreach ($albums as $album): ?>
                <div class="rectangle_album">
                    <form action="../partie_Accueil/accueil.php" method="GET">
                        <input type="hidden" name="Id_Play_Music" value="<?php echo htmlspecialchars($album['ID']); ?>">
                        <button class="Jouer" type="submit">
                            <?php if (!empty($album['Lien_Image_Album'])): ?>
                                <div class="image_album" style="background-image: url(<?php echo htmlspecialchars($album['Lien_Image_Album']); ?>);"></div>
                            <?php endif; ?>
                            <div class="text_action_album">
                                <h2><?php echo htmlspecialchars($album['Nom_Album']); ?></h2>
                                <p><?php echo htmlspecialchars($album['Description']); ?></p>
                                <p>Ajouté le : <?php echo htmlspecialchars($album['Date_Ajout']); ?></p>
                                <p>Style : <?php echo htmlspecialchars($album['Style_musique']); ?></p>
                            </div>
                        </button>
                        <h2 class="titre_responsive"><?php echo htmlspecialchars($album['Nom_Album']); ?></h2>
                    </form>
                    <form action="../body/delete_album.php" method="POST" class="deleteForm">
                        <input type="hidden" name="albumId" value="<?php echo htmlspecialchars($album['ID']); ?>">
                        <button type="button" class="deleteButton">✖</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Aucun album ajouté.</p>
    <?php endif; ?>
</div>

<!-- Modal pour la confirmation -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span id="closedeleteModal">&times;</span>
        <p>Êtes-vous sûr de vouloir supprimer cet album ?</p>
        <button id="confirmDelete">Supprimer</button>
        <button id="cancelDelete">Annuler</button>
    </div>
</div>
<!-- Style pour afficher les images des albums dans la div .image_album -->
<style>
.image_album {
    opacity: 1;
    display: block;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
    position: absolute;
    background-repeat: no-repeat;
    background-size: contain;
    width: 295px; 
    height: 295px;
    border-radius: 15px; 
}

@media screen and (max-width: 1024px) {
    .image_album {
        width: 150px;
        height: 150px;
        position: relative;
    }
}
</style>

