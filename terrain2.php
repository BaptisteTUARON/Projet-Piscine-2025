<?php

$database = "projet_piscine";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found  = mysqli_select_db($db_handle, $database);

if ($db_found) {

    $sql = "SELECT * FROM bien_immobilier WHERE Categorie = 'Terrain'";
    
    $result = mysqli_query($db_handle, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $photoPath = htmlspecialchars($row['Photo']);
            echo "<img src=\"$photoPath\" alt=\"Image bien\" width=\"400\" height=\"260\">";
        }
    } else {
        echo "Aucune image trouvée.";
    }

} else {
    echo "Database not found";
}

mysqli_close($db_handle);
?>