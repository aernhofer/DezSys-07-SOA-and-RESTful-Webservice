User erstellen mit 
	sudo -u postgres createuser -P -d iknow
mit dem passwort iknow

mit dem iknow user anmelden und mit
	create database iknow;
die datenbank erstellen

alle datein in die vm kopieren

mittels chmod 777 start.sh und login.sh ausführbar machen

./start ausführen und es sollte alles gehen

In generator.php kann mittels der Variable anzahl eingestellt werden wie viele Eintraege erzeugt werden sollen.
__________________________________________

Mongodb:

mongoimport --db test --collection person --jsonArray --type json  --file data.json
________________________________________________

bei sh:
	in der vi
		:set fileformat=unix