<?php
  function print_filtre($connex){
    echo "<h3>Type: </h3>";
    echo "<label for=\"CDD\">CDD</label><input id=\"CDD\" type=\"radio\" name=\"type\" value=\"CDD\">\n<label for=\"CDI\">CDI</label><input id=\"CDI\" type=\"radio\" name=\"type\" value=\"CDI\">\n";


    echo "<h3>Dates: </h3>";
    echo "<label for=\"début\">A partir de: </label><input type=\"date\" name=\"début\" min=\"".date('Y-m-d')."\" id=\"début\">\n<label for=\"fin\">Jusqu'à: </label><input type=\"date\" name=\"fin\" min=\"".date('Y-m-d')."\" id=\"fin\">";


    echo "<h3>Region</h3>";
    $req = "SELECT * FROM regions ORDER BY name";
    $res = mysqli_query($connex, $req);
    echo "<ul class=\"regions\">\n";
    while ($ligne = mysqli_fetch_assoc($res)){
      echo "<li><label for=\"".$ligne['name'].$ligne['id']."\">".$ligne['name']."</label><input type=\"radio\" name=\"regions\" value=\"".$ligne['id']."\" id=\"".$ligne['name'].$ligne['id']."\"></li>\n";
    }
    echo "</ul>";


    echo "<h3>Departement</h3>";
    $req = "SELECT * FROM departements ORDER BY name";
    $res = mysqli_query($connex, $req);
    echo "<ul class=\"departements\">\n";
    while ($ligne = mysqli_fetch_assoc($res)){
      echo "<li><label for=\"".$ligne['name'].$ligne['id']."\">".$ligne['name']."</label><input type=\"radio\" name=\"departements\" value=\"".$ligne['id']."\" id=\"".$ligne['name'].$ligne['id']."\"></li>\n";
    }
    echo "</ul>";


    echo "<h3>Ville</h3>";
    $req = "SELECT * FROM cities ORDER BY name";
    $res = mysqli_query($connex, $req);
    echo "<ul class=\"cities\">\n";
    while ($ligne = mysqli_fetch_assoc($res)) {
      echo "<li><label for=\"".$ligne['name'].$ligne['id']."\">".$ligne['name']."</label><input type=\"radio\" name=\"cities\" value=\"".$ligne['id']."\" id=\"".$ligne['name'].$ligne['id']."\"></li>\n";
    }
    echo "</ul>";

  }
?>
