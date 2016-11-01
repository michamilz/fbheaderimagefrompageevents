# FB Headerbild aus den Events einer Seite

Dieses Skript holt sich die kommenden Events einer FB Seite und erstellt daraus ein Headerbild.

## Einrichtung

### Vorlage erstellen

Das Skript setzt die Eventdaten in die Datei vorlage.png ein. Die Datei ist im PNG Format
und 828x465 Pixel groß. Der Bereich von 828x150 Pixel im unteren Bereich ist dabei nur auf
mobilen Geräten sichtbar.

### Schriftart hinterlegen

Die gewünschte Schrift muss als ttf im Fonts-Ordner hinterlegt werden.

### config.php erstellen

Die Datei config.example.php als config.php kopieren und die Werte anpassen.

Die notwendige FB App kann unter https://developers.facebook.com/ angelegt werden.
http://findmyfbid.com/ hilft, die Page ID einer Seite zu finden.

### Position der Ausgabe anpassen

In der Zeile mit "$headerimage->write(...)" wird u.a. die Position der Eventdetails definiert.
Bei Bedarf kann diese hier angepasst werden.

### Abhängigkeiten holen

Ein beherztes "composer install" holt die benötigten Bibliotheken.

## Bild erstellen

Der Aufruf "php generateimage.php" erstellt im gleichen Verzeichnis das Headerbild.

## Motivation

Dieses Skript entstand als Arbeitserleichterung für die Menschen im [Komplex Schwerin](https://komplex-schwerin.de/). 
Dem alternativen, antifaschistischen Zentrum für Musik, Kultur, Wohnen und Leben in Schwerin.