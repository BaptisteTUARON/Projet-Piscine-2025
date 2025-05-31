<?php

$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found  = mysqli_select_db($db_handle, $database);

if ($db_found) {
    $sql = "SELECT * FROM bien_immobilier WHERE Categorie = 'Appartements à louer'";
    $result = mysqli_query($db_handle, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $photo = htmlspecialchars($row['Photo']);
            $categorie = htmlspecialchars($row['Categorie']);
            $id = htmlspecialchars($row['ID']);
            $superficie = isset($row['Superficie']) ? $row['Superficie'] : '';
            $prix = isset($row['Prix']) ? number_format($row['Prix'], 0, ',', ' ') . " €" : '';
            $description = nl2br(htmlspecialchars($row['Description']));
            $adresse = isset($row['Adresse']) ? $row['Adresse'] : '';
            $ville = isset($row['Ville']) ? $row['Ville'] : '';

            echo '<div class="bien-toutParcourir">';
            echo "<img src=\"$photo\" alt=\"Photo bien\" width=\"300\" height=\"200\">";
            echo "<p><strong>$categorie - $id</strong></p>";
            echo "<p>$superficie m² - $prix</p>";
            echo "<p>$description</p>";
            echo "<p>$adresse $ville</p>";
            echo '</div>';
        }
    } else {
        echo "<p>Aucun bien dans la catégorie résidentielle.</p>";
    }
} else {
    echo "Base de données non trouvée.";
}

mysqli_close($db_handle);
?>
