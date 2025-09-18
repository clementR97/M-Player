<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M-Player</title>
    <link rel="stylesheet" href="style.css">

    <body>
    

    <div id="wave-container">
        <canvas id="wave-canvas"></canvas>    
    </div>
    <div id="img_logo">
        <h1 id="logo_index"><img src="img/icon-m-player.png"class="mt-5" width="450"/> Player</h1>
    
        <div id="partie_button">
            <form action="partie_Connexion/pageConnexionUser.php" method=" post">
                <button type="submit" id="btn_connexion" class="btn1">Se connecter</button>
                <button type="submit" id="btn_inscription" class="btn1" formaction="../M_Player/partie_Inscription/pageInscriptionUser.php">S'inscrire</button>

            </form>

        </div>
    </div>
    <script src="script.js"></script>
   
</body>
</html>
