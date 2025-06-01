<div>

    <?php

    $role = $_SESSION['utilisateur_role'] ?? 'Inconnu';
    $nom = $_SESSION['utilisateur_nom'] ?? 'Inconnu';
    $prenom = $_SESSION['utilisateur_prenom'] ?? 'Inconnu';
    $email = $_SESSION['utilisateur_email'] ?? 'Inconnu';

    $conn = new mysqli("localhost", "root", "", "projet_piscine");
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    ?>

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
    <?php

        echo "<h3>Planning de la semaine</h3>";

        // Récupérer ID de l’agent
        $stmt = $conn->prepare("SELECT ID FROM agent_immobilier WHERE Courriel = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultID = $stmt->get_result();

        if ($resultID->num_rows > 0) {
            $agent = $resultID->fetch_assoc();
            $agent_id = $agent['ID'];

            $sql = "SELECT * FROM disponibilite 
                    WHERE agent_id = ? 
                    ORDER BY FIELD(jour_semaine, 'Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'), heure_debut";
            $stmt2 = $conn->prepare($sql);
            $stmt2->bind_param("i", $agent_id);
            $stmt2->execute();
            $result = $stmt2->get_result();

            if ($result->num_rows > 0) {
                echo "<table border='1'>
                        <tr>
                            <th>Jour</th>
                            <th>Heure début</th>
                            <th>Heure fin</th>
                            <th>Réservé ?</th>
                            <th>Email du client</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['jour_semaine']}</td>
                            <td>{$row['heure_debut']}</td>
                            <td>{$row['heure_fin']}</td>
                            <td>" . ($row['est_reserve'] ? 'Oui' : 'Non') . "</td>
                            <td>" . ($row['client_email'] ?? 'Aucun') . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>Aucun créneau disponible.</p>";
            }
        } else {
            echo "<p>Agent introuvable.</p>";
        }
    ?>

<?php elseif ($role === 'client'): ?>
  <h2>Bonjour <?= htmlspecialchars($prenom . ' ' . $nom) ?> !</h2>
    <?php
        echo "<h3>Mes réservations</h3>";

        $stmt = $conn->prepare("SELECT * FROM disponibilite 
                                WHERE client_email = ? AND est_reserve = 1
                                ORDER BY FIELD(jour_semaine, 'Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'), heure_debut");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<form method='post'>";
            echo "<table border='1'>
                    <tr>
                        <th>Jour</th>
                        <th>Heure début</th>
                        <th>Heure fin</th>
                        <th>Annuler</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['jour_semaine']}</td>
                        <td>{$row['heure_debut']}</td>
                        <td>{$row['heure_fin']}</td>
                        <td>
                            <button type='submit' name='annuler' value='{$row['id']}'>Annuler</button>
                        </td>
                      </tr>";
            }
            echo "</table>";
            echo "</form>";
        } else {
            echo "<p>Aucune réservation en cours.</p>";
        }

        // Traitement annulation
        if (isset($_POST['annuler'])) {
            $id_to_cancel = intval($_POST['annuler']);
            $cancel_sql = "UPDATE disponibilite SET est_reserve = 0, client_email = NULL WHERE id = ? AND client_email = ?";
            $cancel_stmt = $conn->prepare($cancel_sql);
            $cancel_stmt->bind_param("is", $id_to_cancel, $email);
            $cancel_stmt->execute();

            echo "Réservation annulée avec succès";
            // Rafraîchir la page pour mettre à jour les réservations
        }
    ?>

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