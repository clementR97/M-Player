<link href="../header/modal.css" rel="stylesheet">
<!-- <link rel="stylesheet" href="../header/header-style.css"> -->
<link rel="stylesheet" media="screen and (max-width: 1024px)" href="../header/header-responsive.css">

<header>
    <?php
// session_start();
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("location: ../partie_Connexion/pageConnexionUser.php");
        exit;
    }
    $nom = $_SESSION['nom'];

      require_once '../header/fetch_user.php';

      error_reporting(E_ALL);
      ini_set('display_errors', 1);
?>
    <a href="#"><img id="img_logo" src="../img/icon-m-player.png" width="110" style="margin-left: 30px;" /></a>
    <button id="openModalBtn" style="display: flex; align-items:center;">
        <img src="../header/BOUTON/plus.png" width="40" />
        <span> Upload ma musique</span>
    </button>

    <div id="icone_user">
        <button id="openProfil"><img src="../header/BOUTON/profile.png" width="70" /></button>
        <div style="display: flex; flex-direction:column;">
            <span>Salut, <?php echo htmlspecialchars($nom); ?></span>
            <!-- code déconnexion -->
            <a href="../logout.php" style="color: white; text-decoration:none; ">Déconnexion</a>
        </div>

        <!-- modal profil utilisateur -->

        <div id="myModalUser" class="modal">
            <!-- contenu du modal profil -->
            <div class="modal-content">
                <span class="close" id="close_modal_user">&times;</span>
                <form id="popupFormProfil" action="../header/Updates_User.php" method="POST">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($prenom); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="telephone">Numéro de téléphone</label>
                        <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars($telephone); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input type="password" id="password" name="password">
                        <small style="color: black;margin-left:50px;">Laissez vide pour ne pas changer le mot de passe</small>
                    </div>
                    <button type="submit" id="button_Update_profil">Modifier</button>
                </form>
            </div>
        </div>

    </div>





    <!-- Le Modal ajouter musique-->
    <div id="myModal" class="modal">
        <!-- Contenu du Modal -->
        <div class="modal-content">
            <span class="close" id="close_modal_music">&times;</span>

            <form id="popupForm" action="../header/add_music.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" id="titre" name="titre" required>
                </div>
                <div class="form-group">
                    <label for="genre_musique">Style de Musique</label>
                    <select name="genre_musique" id="style-select" required>
                        <option value="">--Style--</option>
                        <option value="Hip-hop">Hip-hop</option>
                        <option value="Pop">Pop</option>
                        <option value="Musique électronique">Musique électronique</option>
                        <option value="Rock">Rock</option>
                        <option value="Musique classique">Musique classique</option>
                        <option value="Jazz">Jazz</option>
                        <option value="Musiques du monde">Musiques du monde</option>
                        <option value="Autres styles">Autres styles</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="mp3">Fichier MP3</label>
                    <input type="file" id="mp3" name="mp3" accept="audio/mpeg" required>
                </div>
                <button type="submit" id="button_Add_music">Ajouter</button>
            </form>
        </div>
    </div>
    <!-- <script src="../header/modal.js"></script> -->
</header>
<style>
@media  screen and (max-width: 1024px){
    header{       
                        width:555px;
                      }
}  
</style>