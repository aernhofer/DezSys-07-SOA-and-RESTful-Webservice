<?php
    //Die Datei, in die die SQL-Befehle geschrieben werden sollen
    $insertFile = fopen("data.json", "w");
    //Variablen für die Anzahlen
    $anzahl = 10;
    $laengesuchbegriff = array("min" => 10, "max" => 20);
    $laengebeschreibung = array("min" => 100, "max" => 150);

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
        fwrite($GLOBALS['insertFile'], "[\n");
        for($i=1;$i <= $GLOBALS['anzahl']-1;++$i){
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

          //Schreibt den Befehl in die Datei
          fwrite($GLOBALS['insertFile'], "{
                             suchbegriff: \"'$suchbegrifftmp'\",
                             beschreibung: \"'$beschreibungtmp'\"
                         },\n");
        }
        //noch einmal aber ohne beistrich                  _class: \"hello.Person\",
        fwrite($GLOBALS['insertFile'], "{
                           suchbegriff: \"tests\",
                           beschreibung: \"testb\"
                       }]\n");
    }

    echo "Erzeugen von ".$anzahl." Eintraegen\n";
    generate();
    echo "Erledigt!";

?>
