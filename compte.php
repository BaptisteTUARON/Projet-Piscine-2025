<?php include 'session.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css" type="text/css">
  <link rel="stylesheet" href="compte.css" type="text/css">
  <link rel="icon" type="image/x-icon" href="logo.jpg">
  <script src="compte.js"></script>
  <title>Omnes Immobilier - Compte</title>

</head>

<body>
  <div id="wrapper">

    <div id="header">
      <h1>
        <img id="logo" src="logo.jpg" alt="Omnes Immobilier Logo">
        Omnes Immobilier
      </h1>
    </div>

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

    <div id="section">
      <div class="connexion">

        <div class="buttons-connexion">
          <button class="btn-role" id="btn-client" onclick="showForm('client')">Client</button>
          <button class="btn-role" id="btn-agent" onclick="showForm('agent')">Agent Immobilier</button>
          <button class="btn-role" id="btn-admin" onclick="showForm('admin')">Administrateur</button>
        </div>

        <div id="form-client" class="form-container">
          <h3 class="form-title">Connexion Client</h3>
          <form action="connexion_client.php" method="post">
            <div class="form-group">
              <label for="client-courriel">Courriel</label>
              <input type="text" id="client-courriel" name="mail" required>
            </div>
            <div class="form-group">
              <label for="client-password">Mot de passe</label>
              <input type="password" id="client-password" name="password" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn-submit">Se connecter</button>
              <button type="button" class="btn-secondary" onclick="showInscription()">S'inscrire</button>
            </div>
          </form>
        </div>

        <div id="form-inscription" class="form-container">
          <h3 class="form-title">Inscription Client</h3>
          <form action="inscription_client.php" method="post">
            <div class="form-group">
              <label for="inscription-nom">Nom</label>
              <input type="text" id="inscription-nom" name="nom" required>
            </div>
            <div class="form-group">
              <label for="inscription-prenom">Prénom</label>
              <input type="text" id="inscription-prenom" name="prenom" required>
            </div>
            <div class="form-group">
              <label for="inscription-email">Courriel</label>
              <input type="email" id="inscription-email" name="email" required>
            </div>
            <div class="form-group">
              <label for="inscription-telephone">Téléphone</label>
              <input type="tel" id="inscription-telephone" name="telephone" required>
            </div>
            <div class="form-group">
              <label for="inscription-adresse1">Adresse 1</label>
              <input type="text" id="inscription-adresse1" name="adresse1" required>
            </div>
            <div class="form-group">
              <label for="inscription-adresse2">Adresse 2</label>
              <input type="text" id="inscription-adresse2" name="adresse2" required>
            </div>
            <div class="form-group">
              <label for="inscription-password">Mot de passe</label>
              <input type="password" id="inscription-password" name="password" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn-submit">S'inscrire</button>
              <button type="button" class="btn-secondary" onclick="showForm('client')">Retour</button>
            </div>
          </form>
        </div>

        <div id="form-agent" class="form-container">
          <h3 class="form-title">Connexion Agent Immobilier</h3>
          <form action="connexion_agent.php" method="post">
            <div class="form-group">
              <label>Nom</label>
              <input type="text" id="agent-nom" name="nom" required>
            </div>
            <div class="form-group">
              <label>Prénom</label>
              <input type="text" id="agent-prenom" name="prenom" required>
            </div>
            <div class="form-group">
              <label>Courriel</label>
              <input type="text" id="agent-courriel" name="email" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn-submit">Se connecter</button>
            </div>
          </form>
        </div>

        <div id="form-admin" class="form-container">
          <h3 class="form-title">Connexion Administrateur</h3>
          <form action="connexion_admin.php" method="post">
            <div class="form-group">
              <label>Nom</label>
              <input type="text" id="admin-nom" name="nom" required>
            </div>
            <div class="form-group">
              <label>Prénom</label>
              <input type="text" id="admin-prenom" name="prenom" required>
            </div>
            <div class="form-group">
              <label>Courriel</label>
              <input type="text" id="admin-courriel" name="email" required>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn-submit">Se connecter</button>
            </div>
          </form>
        </div>
      </div>

      <div class="deconnexion">
        <h3>Déconnexion</h3>
        <button class="btn-deconnexion">
            <a id="btndeco" href="deconnexion.php">Se déconnecter<a>
        </button>
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
            height="250" style="border:0; width: 100%;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>

</body>

</html>