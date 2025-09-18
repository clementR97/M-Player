<?php
// require_once 'DataBase.php';
require_once '../DataBase/Music_poo.php';


$id_album = isset($_GET['Id_Play_Music']) ? intval($_GET['Id_Play_Music']) : 0;

$db = new Database();
$music = new Music($db->getPDO());
$resultat = $music->getMusicById($id_album);

    // if ($resultat) {
        $image_album = isset($resultat['Lien_Image_Album'])? $resultat['Lien_Image_Album']:'';
        $mp3Path = isset($resultat['Lien_musique'])? $resultat['Lien_musique']:'';
        $titreAlbum = isset($resultat['Nom_Album'])?$resultat['Nom_Album']:'';
        
    // } else {
        // $image_album = null;
        // $mp3Path = null;
        // $titreAlbum = null;
    // }

?>