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

    if ($role === 'Agent Immobilier') {
        echo "<h3>Planning de la semaine</h3>";

        // Connexion à la BDD
        $conn = new mysqli("localhost", "root", "", "projet_piscine");
        if ($conn->connect_error) {
            die("Erreur de connexion : " . $conn->connect_error);
        }

        // Récupération de l'ID de l'agent depuis la table agent_immobilier
        $stmt = $conn->prepare("SELECT ID FROM agent_immobilier WHERE Courriel = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultID = $stmt->get_result();

        if ($resultID->num_rows > 0) {
            $agent = $resultID->fetch_assoc();
            $agent_id = $agent['ID'];

            // Récupération des disponibilités de l'agent
            $sql = "SELECT * FROM disponibilite WHERE agent_id = ? ORDER BY FIELD(jour_semaine, 'Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'), heure_debut";
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

        $stmt->close();
        $conn->close();
    }
} else {
    echo "<p>Aucune information d'utilisateur disponible. Veuillez vous connecter.</p>";
}
?>
</div>
