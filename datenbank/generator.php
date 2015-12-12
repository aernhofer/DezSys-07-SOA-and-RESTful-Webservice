<?php
    //Die Datei, in die die SQL-Befehle geschrieben werden sollen
    $insertFile = fopen("insert.sql", "w");
    //Variablen für die Anzahlen
    $anzahl = 1000000;
    $laengesuchbegriff = array("min" => 10, "max" => 20);
    $laengebeschreibung = array("min" => 100, "max" => 200);

    //Zeichen aus denen ein Suchbegriff zusammengesetzt wird
    $alphasuch = "abcdefghijklmnopqrstuvwxyz" .
			     "ABCDEFGHIJKLMNOPQRSTUVWXYZ" .
			     "0123456789";

     //Zeichen aus denen eine Beschreibung zusammengesetzt wird
     $alphabeschr = "abcdefghijklmnopqrstuvwxyz" .
 			        "ABCDEFGHIJKLMNOPQRSTUVWXYZ" .
 			        "0123456789" .
			        " ";

    //============================
    //Generiert inserts für wissen
    //============================
    function generate(){
        //INSERT INTO wissen (suchbegriff, beschreibung) VALUES (suchbegriff, beschreibung);
        fwrite($GLOBALS['insertFile'], "-- INSERTs for table --\n");
        for($i=1;$i <= $GLOBALS['anzahl'];++$i){
          $suchbegrifftmp = "";
          $beschreibungtmp = "";

          //Suchbegriff erzeugen
          for($laengesuchbegrifftmp = rand($GLOBALS['laengesuchbegriff']["min"], $GLOBALS['laengesuchbegriff']["max"]);$laengesuchbegrifftmp>0;$laengesuchbegrifftmp--){
              $suchbegrifftmp = $suchbegrifftmp . substr($GLOBALS['alphasuch'], rand(0, strlen($GLOBALS['alphasuch'])-1), 1);
          }

          //Berschreibung erzeugen
          for($laengebeschreibungtmp = rand($GLOBALS['laengebeschreibung']["min"], $GLOBALS['laengebeschreibung']["max"]);$laengebeschreibungtmp>0;$laengebeschreibungtmp--){
              $beschreibungtmp = $beschreibungtmp . substr($GLOBALS['alphabeschr'], rand(0, strlen($GLOBALS['alphabeschr'])-1), 1);
          }

          //Schreibt den SQL-Befehl in die Datei
          fwrite($GLOBALS['insertFile'], "INSERT INTO wissen (suchbegriff, beschreibung) VALUES ('$suchbegrifftmp', '$beschreibungtmp');\n");
        }
    }

    echo "Erzeugen von ".$anzahl." Eintraegen\n";
    fwrite($GLOBALS['insertFile'], "INSERT INTO wissen VALUES ('suchbegriff1', 'beschreibung1');\n");
    generate();
    echo "Erledigt!";

?>
