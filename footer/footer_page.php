<?php
require '../footer/lecteurMP3.php';
// require 'Music_poo.php';


// $id_album = isset($_GET['Id_Play_Music']) ? intval($_GET['Id_Play_Music']) : 0;

// $db = new Database();
// $music = new Music($db->getPDO());
// $resultat = $music->getMusicById($id_album);

//     // if ($resultat) {
//         $image_album = isset($resultat['Lien_Image_Album'])? $resultat['Lien_Image_Album']:'';
//         $mp3Path = isset($resultat['Lien_musique'])? $resultat['Lien_musique']:'';
//         $titreAlbum = isset($resultat['Nom_Album'])?$resultat['Nom_Album']:'';
        
    // } else {
        // $image_album = null;
        // $mp3Path = null;
        // $titreAlbum = null;
    // }

?>
<!-- <link href="../footer/footer.css" rel="stylesheet"> -->

<link rel="stylesheet" media="screen and (max-width: 1024px)" href="../footer/footer_responsive.css">
<footer>
<div id="rectangle_lecteur">
 <!-- partie image de l'album -->

   
    <div id="img_album" style="background-image:url(<?php echo htmlspecialchars($image_album); ?>); 
    background-size:contain; 
     background-repeat: no-repeat;">
          <?php if (!empty($image_album)): ?>

           <?php else: ?>
               <span>Aucune image.</span>
           <?php endif; ?>
    </div>
           <!-- partie titre album -->
           <div id="titre_chanson">
              <?php if (!empty($titreAlbum)): ?>
                  <h3><?php echo htmlspecialchars($titreAlbum); ?></h3>
               <?php else: ?>
                  <span>Choisi ta musique</span>
               <?php endif; ?>

                    <?php if (!empty($mp3Path)): ?>
                        <div id="style_audio_titre">
                             <audio id="audioPlayer" src="<?php echo htmlspecialchars($mp3Path); ?>"></audio>
                    
                             <input type="range" id="seek-bar" value="0">
                             <span id="currentTime">0:00</span> / <span id="duration">0:00</span> 
                        </div>
           </div>
<!-- partie lecture musique -->
    
                <div id="bouton_js">
                    <button id="rewindBtn" class="style_button"></button>
                    <button id="play_pause_Btn" class="style_button"></button>
                    <button id="forwardBtn" class="style_button"></button>  
                </div>
 <?php endif; ?>

</div>
   
</footer> 
<script src="../footer/action_bouton.js"></script>
<style>
    #rectangle_lecteur{
        top: 710px;
    }
@media  screen and (max-width: 768px){
    #rectangle_lecteur{       
                        width:555px;
                        top: 730px;
                      }
}  
</style>