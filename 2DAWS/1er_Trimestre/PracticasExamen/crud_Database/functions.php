<?php
function verPaises($conexion){

    $query = $conexion->query("SELECT * FROM country");
    echo "<table>";
        while ($data = $query->fetch_array()) {
            echo "<tr>";
                echo "<td><span>'".$data['Code']."'";
                echo "<td><span>'".$data['Name']."'";
                echo "<td><span>'".$data['Continent']."'";
                echo "</tr>";
        }
    echo "</table>";
}


