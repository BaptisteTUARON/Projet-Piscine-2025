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

    <script>
        window.onload = function () {
            fetch('charger_disponibilites.php')
                .then(res => res.text())
                .then(html => {
                    document.getElementById('tables-agents').innerHTML = html;
                });
        };

        function reserverCreneau(idDispo) {
            const nom = prompt("Entrez votre nom :");
            const prenom = prompt("Entrez votre prénom :");
            const email = prompt("Entrez votre email :");

            if (!nom || !prenom || !email) {
                alert("Tous les champs sont obligatoires.");
                return;
            }

            fetch('reserver_creneau.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `id=${idDispo}&nom=${encodeURIComponent(nom)}&prenom=${encodeURIComponent(prenom)}&email=${encodeURIComponent(email)}`
            })
                .then(res => res.text())
                .then(response => {
                    alert(response);
                    location.reload(); // Recharge les créneaux
                });
        }
    </script>
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <h1>
                <img id=logo src="logo.jpg" alt="Omnes Immobilier Logo" width="100" height="100">
                Omnes Immobilier
            </h1>
        </div>
        <br>

        <div id="nav">
            <a href="index.php">Accueil</a>
            <div class="dropdown">
                <a href="toutParcourir.html">Tout Parcourir</a>
                <div class="dropdown-content">
                    <a href="immoResidentiel.html">Immobilier Résidentiel</a>
                    <a href="immoCommercial.html">Immobilier Commercial</a>
                    <a href="terrain.html">Terrain</a>
                    <a href="appartLouer.html">Appartements à louer</a>
                    <a href="immoEnchere.html">Immobilier en vente par enchère</a>
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
        <div id="section"
            style="display: flex; flex-direction: column; align-items: center; justify-content: flex-start;">
            <h1 style="text-align: center;">Prendre un rendez-vous avec un de nos conseillers</h1>
            <div id="tables-agents" style="width: 100%; overflow-x: auto;">
                <!-- Les tableaux par agent seront générés ici via PHP -->
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
