<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <title>Omnes Immobilier</title>

</head>

<body>
    <div id="wrapper">

        <div id="header">
            <h1>
                <img id=logo src="logo.jpg"
                    alt="Omnes Immobilier Logo" width="100" height="100">
                Omnes Immobilier
            </h1>
        </div>
        <br>

        <div id="nav">
            <a href="index.php">Accueil</a>
            <div class="dropdown">
                <a href="toutParcourir.php">Tout Parcourir</a>
                <div class="dropdown-content">
                    <a href="immoResidentiel.php">Immobilier Résidentiel</a>
                    <a href="immoCommercial.php">Immobilier Commercial</a>
                    <a href="terrain.php">Terrain</a>
                    <a href="appartLouer.php">Appartements à louer</a>
                    <a href="immoEnchere.php">Immobilier en vente par enchère</a>
                </div>
            </div>
            <a href="recherche.php">Recherche</a>
            <a href="prendreRDV.php">Rendez-vous</a>

            <span style="float:right; padding-right: 20px;">
                <?php if ($role): ?>
                    <a href="compte.php" style="margin-left: 10px;">Compte</a>
                    Connecté en tant que <strong><?= ucfirst($role) ?></strong> (<?= $prenom ?> <?= $nom ?>)
                <?php else: ?>
                    <a href="compte.php">Compte</a>
                <?php endif; ?>
            </span>

        </div>

        <br>

        <div id="sectionRecherche">
            <div id="caseRecherche">
                <h1>Recherche de biens immobiliers</h1>
                <form action="" method="post">
                    <input id="barreRecherche" type="text" id="search" name="search" placeholder="Nom d'un agent immobilier ou Numéro d'une propriété ou Ville">
                    <button id="boutonRecherche" type="submit">Rechercher</button>
                </form>
                <div id="resultatsRecherche">
                    <?php include 'resultats_recherche.php'; ?>
                </div>
            </div>
        </div>

        <div id="footer">
            <div class="footer-content">
                <div class="footer-left">
                    <h3>Contact</h3>
                    <p><strong>Omnes Immobilier</strong></p>
                    <p>12 rue de l'Immobilier, 75000 Paris</p>
                    <p>Tél : +33 1 23 45 67 89</p>
                    <p>Email : contact@omnes-immobilier.fr</p>
                </div>

                <div class="footer-right">
                    <h3>Localisation</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2536.486706613472!2d2.2859909763572652!3d48.851225171331194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris!5e1!3m2!1sen!2sfr!4v1748246695262!5m2!1sen!2sfr" 
                     height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>



</body>

</html>