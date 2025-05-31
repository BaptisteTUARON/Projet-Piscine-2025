<div>
  <?php if ($role === 'admin'): ?>

    <script>
        function toggleSection(section) {
          const biens = document.getElementById('section-biens');
          const agents = document.getElementById('section-agents');

          if (section === 'biens') {
            biens.style.display = biens.style.display === 'none' ? 'block' : 'none';
            agents.style.display = 'none';
          } else if (section === 'agents') {
            agents.style.display = agents.style.display === 'none' ? 'block' : 'none';
            biens.style.display = 'none';
          }
        }
    </script>

     <h2>Bonjour, <?= htmlspecialchars($prenom . ' ' . $nom) ?> !</h2>

     <button onclick="toggleSection('biens')" style="margin: 5px;">Gestion des biens</button>
     <button onclick="toggleSection('agents')" style="margin: 5px;">Gestion des Agents Immobiliers</button>

     <div id="section-biens" style="display: none; margin-top: 15px;">
        <h3>Ajouter ou Spprimer des biens</h3>
        <form method="post">

            <label>Id</label><br>
            <input type="number" name="id"><br><br>

            <label>Catégorie</label><br>
            <input type="text" name="categorie"><br><br>

            <label>Adresse</label><br>
            <input type="text" name="adresse"><br><br>

            <label>Ville</label><br>
            <input type="text" name="ville"><br><br>

            <label>Description</label><br>
            <input type="text" name="description"><br><br>

            <label>Photo</label><br>
            <input type="text" name="photo"><br><br>

            <label>Superficie</label><br>
            <input type="number" name="superficie"><br><br>

            <label>Prix</label><br>
            <input type="number" name="prix"><br><br>

            <button type="submit" name="ajouter1" value="Ajouter">Ajouter</button>
            <button type="submit" name="supprimer1" value="Supprimer">Supprimer</button>
        </form>
    </div>

    <div id="section-agents" style="display: none; margin-top: 15px;">
        <h3>Ajouter ou Spprimer des agents</h3>
        <form method="post">

            <label>Id</label><br>
            <input type="number" name="id2"><br><br>

            <label>Nom</label><br>
            <input type="text" name="nom"><br><br>

            <label>Prénom</label><br>
            <input type="text" name="prenom"><br><br>

            <label>Spécialité</label><br>
            <input type="text" name="specialite"><br><br>

            <label>CV</label><br>
            <input type="text" name="cv"><br><br>

            <label>Photo</label><br>
            <input type="text" name="photo2"><br><br>

            <label>Courriel</label><br>
            <input type="email" name="courriel"><br><br>

            <label>Téléphone</label><br>
            <input type="number" name="telephone"><br><br>

            <button type="submit" name="ajouter2" value="Ajouter">Ajouter</button>
            <button type="submit" name="supprimer2" value="Supprimer">Supprimer</button>
        </form>
    </div>

<?php elseif ($role === 'Agent Immobilier'): ?>
  <h2>Bonjour, <?= htmlspecialchars($prenom . ' ' . $nom) ?> !</h2>

<?php elseif ($role === 'client'): ?>
  <h2>Bonjour <?= htmlspecialchars($prenom . ' ' . $nom) ?> !</h2>

<?php else: ?>
  <h2>Bienvenue sur notre site !</h2>
  <p>Veuillez vous connecter pour accéder à votre espace personnalisé.</p>
<?php endif; ?>
</div>

<?php

$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '' );
$db_found = mysqli_select_db($db_handle, $database);

$id = isset($_POST["id"])? $_POST["id"] : "";
$categorie = isset($_POST["categorie"])? $_POST["categorie"] : "";
$adresse = isset($_POST["adresse"])? $_POST["adresse"] : "";
$ville = isset($_POST["ville"])? $_POST["ville"] : "";
$description = isset($_POST["description"])? $_POST["description"] : "";
$photo = isset($_POST["photo"])? $_POST["photo"] : "";
$superficie = isset($_POST["superficie"])? $_POST["superficie"] : "";
$prix = isset($_POST["prix"])? $_POST["prix"] : "";

$id2 = isset($_POST["id2"])? $_POST["id2"] : "";
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$specialite = isset($_POST["specialite"])? $_POST["specialite"] : "";
$cv = isset($_POST["cv"])? $_POST["cv"] : "";
$photo2 = isset($_POST["photo2"])? $_POST["photo2"] : "";
$courriel = isset($_POST["courriel"])? $_POST["courriel"] : "";
$telephone = isset($_POST["telephone"])? $_POST["telephone"] : "";

if (isset($_POST['ajouter1'])) {

    $id1 = mysqli_real_escape_string($db_handle, $id);
    $categorie1 = mysqli_real_escape_string($db_handle, $categorie);
    $adresse1 = mysqli_real_escape_string($db_handle, $adresse);
    $ville1 = mysqli_real_escape_string($db_handle, $ville);
    $description1 = mysqli_real_escape_string($db_handle, $description);
    $photo1 = mysqli_real_escape_string($db_handle, $photo);
    $superficie1 = mysqli_real_escape_string($db_handle, $superficie);
    $prix1 = mysqli_real_escape_string($db_handle, $prix);

    $sql_check = "SELECT * FROM bien_immobilier WHERE ID = '$id1'";
    $result_check = mysqli_query($db_handle, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {

        echo '<h1>Le bien existe déjà.</h1>';

    } else {

    $sql = "INSERT INTO bien_immobilier (ID, Categorie, Adresse, Ville, Description, Photo, Superficie, Prix) 
        VALUES ('$id', '$categorie1', '$adresse1', '$ville1', '$description1', '$photo1', '$superficie1', '$prix1')";
    $result = mysqli_query($db_handle, $sql);

    echo '<h1>Le bien a été ajouté.</h1>';

    }
}

if (isset($_POST['supprimer1'])) {

    $id1 = mysqli_real_escape_string($db_handle, $id);
    $categorie1 = mysqli_real_escape_string($db_handle, $categorie);
    $adresse1 = mysqli_real_escape_string($db_handle, $adresse);
    $ville1 = mysqli_real_escape_string($db_handle, $ville);
    $description1 = mysqli_real_escape_string($db_handle, $description);
    $photo1 = mysqli_real_escape_string($db_handle, $photo);
    $superficie1 = mysqli_real_escape_string($db_handle, $superficie);
    $prix1 = mysqli_real_escape_string($db_handle, $prix);

    $sql_check = "SELECT * FROM bien_immobilier WHERE ID = '$id1'";
    $result_check = mysqli_query($db_handle, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {

        $sql = "DELETE FROM bien_immobilier WHERE ID = '$id1'";
        $result = mysqli_query($db_handle, $sql);
        echo '<h1>Le bien a été supprimé.</h1>';
    }
    else {
        echo '<h1>Impossible de supprimer, le bien n existe pas.</h1>';
    }

}

if (isset($_POST['ajouter2'])) {

    $id3 = mysqli_real_escape_string($db_handle, $id2);
    $nom1 = mysqli_real_escape_string($db_handle, $nom);
    $prenom1 = mysqli_real_escape_string($db_handle, $prenom);
    $specialite1 = mysqli_real_escape_string($db_handle, $specialite);
    $cv1 = mysqli_real_escape_string($db_handle, $cv);
    $photo3 = mysqli_real_escape_string($db_handle, $photo2);
    $courriel1 = mysqli_real_escape_string($db_handle, $courriel);
    $telephone1 = mysqli_real_escape_string($db_handle, $telephone);

    $sql_check = "SELECT * FROM agent_immobilier WHERE ID = '$id3'";
    $result_check = mysqli_query($db_handle, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {

        echo '<h1>L agent immobilier existe déjà.</h1>';

    } else {

    $sql = "INSERT INTO agent_immobilier (ID, Nom, Prenom, Photo, Specialite, CV, Courriel, Telephone) 
        VALUES ('$id2', '$nom', '$prenom', '$photo2', '$specialite', '$cv', '$courriel', '$telephone')";
    $result = mysqli_query($db_handle, $sql);

    echo '<h1>L agent immobilier a été ajouté.</h1>';

    }
}

if (isset($_POST['supprimer2'])) {

    $id3 = mysqli_real_escape_string($db_handle, $id2);
    $nom1 = mysqli_real_escape_string($db_handle, $nom);
    $prenom1 = mysqli_real_escape_string($db_handle, $prenom);
    $specialite1 = mysqli_real_escape_string($db_handle, $specialite);
    $cv1 = mysqli_real_escape_string($db_handle, $cv);
    $photo3 = mysqli_real_escape_string($db_handle, $photo2);
    $courriel1 = mysqli_real_escape_string($db_handle, $courriel);
    $telephone1 = mysqli_real_escape_string($db_handle, $telephone);

    $sql_check = "SELECT * FROM agent_immobilier WHERE ID = '$id3'";
    $result_check = mysqli_query($db_handle, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {

        $sql = "DELETE FROM agent_immobilier WHERE ID = '$id3'";
        $result = mysqli_query($db_handle, $sql);
        echo '<h1>L agent immobilier a été supprimé.</h1>';
    }
    else {
        echo '<h1>Impossible de supprimer, l agent immobilier n existe pas.</h1>';
    }

}

?>