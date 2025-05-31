<div>
<?php

if (isset($_SESSION['utilisateur_role'])) {
    $role = $_SESSION['utilisateur_role'];
    $nom = $_SESSION['utilisateur_nom'] ?? 'Inconnu';
    $prenom = $_SESSION['utilisateur_prenom'] ?? 'Inconnu';
    $email = $_SESSION['utilisateur_email'] ?? 'Inconnu';

    echo "<h2>Informations de l'utilisateur</h2>";
    echo "<p>Rôle : $role</p>";
    echo "<p>Nom : $nom</p>";
    echo "<p>Prénom : $prenom</p>";
    echo "<p>Email : $email</p>";

    $conn = new mysqli("localhost", "root", "", "projet_piscine");
    if ($conn->connect_error) {
        die("Erreur de connexion : " . $conn->connect_error);
    }

    if ($role === 'Agent Immobilier') {
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
    }

    // ------------------ Client : ses réservations ------------------
    if ($role === 'client') {
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
    }

    $conn->close();
} else {
    echo "<p>Aucune information d'utilisateur disponible. Veuillez vous connecter.</p>";
}
?>
</div>
