<?php
  function print_filtre($connex){
    echo "<h3>Type</h3>";
    echo "<label for=\"CDD\">CDD</label><input id=\"CDD\" type=\"radio\" name=\"type\" value=\"CDD\">\n<label for=\"CDI\">CDI</label><input id=\"CDI\" type=\"radio\" name=\"type\" value=\"CDI\">\n";


    echo "<h3>Dates</h3>";
    echo "<label for=\"début\">A partir de: </label><input type=\"date\" name=\"début\" min=\"".date('Y-m-d')."\" id=\"début\"><br>\n<label for=\"fin\">Jusqu'à: </label><input type=\"date\" name=\"fin\" min=\"".date('Y-m-d')."\" id=\"fin\">";


    echo "<div class=\"regions\"><h3>Region</h3>";
    $req = "SELECT * FROM regions ORDER BY name";
    $res = mysqli_query($connex, $req);
    echo "<select name=\"regions\">\n<option value=\"\">Sélectionnez une région</option>";
    while ($ligne = mysqli_fetch_assoc($res)){
      echo "<option value=\"".$ligne['id']."\">".$ligne['name']."</option>";
    }
    echo "</select></div>";


    echo "<div class=\"departements\"><h3>Departement</h3>";
    $req = "SELECT * FROM departements ORDER BY name";
    $res = mysqli_query($connex, $req);
    echo "<select name=\"departements\">\n<option value=\"\">Sélectionnez un département</option>";
    while ($ligne = mysqli_fetch_assoc($res)){
      echo "<option value=\"".$ligne['id']."\">".$ligne['name']."</option>";
    }
    echo "</select></div>";


    echo "<h3>Ville</h3><div class=\"ville\">";
    $req = "SELECT * FROM cities ORDER BY name";
    $res = mysqli_query($connex, $req);
    echo "<select name=\"ville\">\n<option value=\"\">Sélectionnez une ville</option>";
    while ($ligne = mysqli_fetch_assoc($res)) {
      echo "<option value=\"".$ligne['id']."\">".$ligne['name']."</option>";
    }
    echo "</select></div>";

  }
?>
