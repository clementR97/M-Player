<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="styles_inscription.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-black d-flex justify-content-center align-items-center">

    <div id="wave-container" class="z-1 position-relative">
        <canvas id="wave-canvas"></canvas>
    </div>

    <div id="rectangle_connexion" class="z-2 position-absolute container">
        <img src="../img/icon-m-player.png" class="img-fluid " width="300" />
        <h2>Inscription</h2>
        <form action="../partie_Inscription/insertion_client_BDD.php" method="POST" id="formulaire_inscription">
            <input type="text" placeholder="Nom*" name="nom" class=" my-4 ">
            <input type="text" placeholder="Prénom*" name="prenom" class=" mb-4 ">
            <input type="date" placeholder="Date de Naissance*" name="Date_de_naissance" class=" mb-4 ">
            <input type="text" placeholder="Numéro Téléphone*" name="telephone" class=" mb-4 ">
            <input type="email" placeholder="Adresse email*" name="e-mail" class=" mb-4 ">
            <input type="password" placeholder="Mot de Passe*" name="mot_de_passe" class=" mb-4">
            <input type="password" placeholder="Comfirmer votre Mot de Passe*" class=" mb-5">
            <button id="boutton_connexion" type="submit" class="mb-3">Connexion</button>
        </form>

        <span>Vous avez un compte? <a href="../partie_Connexion/pageConnexionUser.php">Se Connecter</a></span>
    </div>
    <script src="../script.js"></script>
</body>

</html>
