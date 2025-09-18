<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="../partie_Connexion/styles_connexion.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-black d-flex justify-content-center align-items-center">

    <div id="wave-container" class="z-1 position-relative">
        <canvas id="wave-canvas"></canvas>
    </div>

    <div id="rectangle_connexion" class="z-2 position-absolute container">
        <img src="../img/icon-m-player.png" class="img-fluid " width="300" />
        <h2>Se Connecter</h2>
        <form action="verification_client.php" method="POST" id="formulaire_connexion">
            <input name="e_mail" type="email" placeholder="Adresse email*" class=" my-4 ">
            <input name="mot_de_passe" type="password" placeholder="Mot de Passe*" class=" mb-5">
            <button id="boutton_connexion" type="submit" class="mb-3">Connexion</button>
        </form>

        <div id="other_connexion">
            <p>Ou</p>
            <form action="login.php" method="POST">
                <button type="submit" formaction="login.php" id="button_google">
                    <div id="img_google"></div>Se connecter avec Google
                </button>
            </form>
        </div>
        <span>Vous n'avez pas de compte? <a href="../partie_Inscription/pageInscriptionUser.php">S'inscrire</a></span>
    </div>
    <script src="../script.js"></script>
</body>

</html>
