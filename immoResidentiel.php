<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="logo.jpg">
    <title>Omnes Immobilier</title>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="script.js"></script>

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
            <a href="compte.php">Compte</a>

            <span style="float:right; padding-right: 20px;">
                <?php if ($role): ?>
                    Connecté en tant que <strong><?= ucfirst($role) ?></strong> (<?= $prenom ?> <?= $nom ?>)
                    <a href="deconnexion.php" style="margin-left: 10px;">Déconnexion</a>
                <?php else: ?>
                    <a href="compte.php">Se connecter</a>
                <?php endif; ?>
            </span>

        </div>

        <br>

        <div id="section">
            <!-- Colonne gauche : liste des biens -->
            <div class="col-gauche-immo">
                <div class="appartement-immo">
                    <div class="infos">
                        <h3>420 000 €</h3>
                        <p>4 941 €/m²</p>
                        <p><strong>Appartement à  vendre</strong><br>
                        3 chambres・ 2 salles de bains・ 85 m²<br> 12 Rue Lafayette, 75009 Paris.</p>
                    </div>
                    <div class="visuel">
                        <img src="Image_bien/1.jpg" alt="Appartement Paris">
                    </div>
                </div>

                <div class="appartement-immo">
                    <div class="infos">
                        <h3>Maison – Marseille</h3>
                        <p><strong>Prix :</strong> 550 000 €</p>
                        <p><strong>Superficie :</strong> 110 m²</p>
                        <p><strong>Chambres :</strong> 3</p>
                        <p><strong>Description :</strong> Maison avec terrasse et jardin, située en périphérie calme.
                        </p>
                    </div>
                    <div class="visuel">
                        <img src="logo.jpg" alt="Maison Marseille">
                    </div>
                </div>
                <div class="appartement-immo">
                    <div class="infos">
                        <h3>Appartement T2 – Bordeaux</h3>
                        <p><strong>Prix :</strong> 320 000 €</p>
                        <p><strong>Superficie :</strong> 60 m²</p>
                        <p><strong>Chambres :</strong> 1</p>
                        <p><strong>Description :</strong> Appartement moderne situé dans le centre historique, proche du
                            tramway.</p>
                    </div>
                    <div class="visuel">
                        <img src="logo.jpg" alt="Appartement Bordeaux">
                    </div>
                </div>

                <div class="appartement-immo">
                    <div class="infos">
                        <h3>Villa – Nice</h3>
                        <p><strong>Prix :</strong> 1 200 000 €</p>
                        <p><strong>Superficie :</strong> 180 m²</p>
                        <p><strong>Chambres :</strong> 4</p>
                        <p><strong>Description :</strong> Villa avec vue mer, piscine et garage, située sur les hauteurs
                            de Nice.</p>
                    </div>
                    <div class="visuel">
                        <img src="logo.jpg" alt="Villa Nice">
                    </div>
                </div>

                <div class="appartement-immo">
                    <div class="infos">
                        <h3>Studio – Lille</h3>
                        <p><strong>Prix :</strong> 150 000 €</p>
                        <p><strong>Superficie :</strong> 30 m²</p>
                        <p><strong>Chambres :</strong> 1</p>
                        <p><strong>Description :</strong> Studio idéal pour étudiant, situé à proximité de l’université
                            Lille 1.</p>
                    </div>
                    <div class="visuel">
                        <img src="logo.jpg" alt="Studio Lille">
                    </div>
                </div>

                <div class="appartement-immo">
                    <div class="infos">
                        <h3>Loft – Lyon Confluence</h3>
                        <p><strong>Prix :</strong> 720 000 €</p>
                        <p><strong>Superficie :</strong> 100 m²</p>
                        <p><strong>Chambres :</strong> 2</p>
                        <p><strong>Description :</strong> Loft design dans un immeuble industriel réhabilité, quartier
                            très recherché.</p>
                    </div>
                    <div class="visuel">
                        <img src="logo.jpg" alt="Loft Lyon">
                    </div>
                </div>

            </div>

            <!-- Colonne droite : image (carrousel futur) -->
            <div class="col-carrousel-immobilier">
                <h2>Carrousel de nos Propriétés Résidentielles</h2>
                <div class="carrousel-container">
                    <img src="Image_bien/1.jpg" alt="Image 1" width="400" height="260">
                    <img src="Image_bien/6.jpg" alt="Image 1" width="400" height="260">
                    <img src="Image_bien/11.jpg" alt="Image 1" width="400" height="260">
                    <img src="Image_bien/16.jpg" alt="Image 1" width="400" height="260">
                    <img src="Image_bien/21.jpg" alt="Image 1" width="400" height="260">
                    <img src="Image_bien/26.jpg" alt="Image 1" width="400" height="260">
                    <img src="Image_bien/31.jpg" alt="Image 1" width="400" height="260">
                    <img src="Image_bien/36.jpg" alt="Image 1" width="400" height="260">
                </div>

                <div class="controls">
                    <button class="prev">←</button>
                    <button class="next">→</button>
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
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2536.486706613472!2d2.2859909763572652!3d48.851225171331194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6701b4f58251b%3A0x167f5a60fb94aa76!2sECE%20Paris!5e1!3m2!1sen!2sfr!4v1748246695262!5m2!1sen!2sfr"
                        height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>



</body>

</html>