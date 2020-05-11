Mit diesem Plugin können Sie die Wattcubes-Module von Wattlet über das steuern
Wattcube Web.

Plugin Konfiguration 
=======================

Nach dem Herunterladen des Plugins müssen Sie es nur noch aktivieren,
Konfigurieren Sie dann die IP-Adresse des Wattcube Web.

![wattlet](../images/wattlet.png)

Gerätekonfiguration 
=============================

Die Synchronisation von Wattlets-Geräten ist über die
Plugins-Menü :

![wattlet2](../images/wattlet2.png)

Sobald Sie auf eine davon klicken, erhalten Sie :

![wattlet3](../images/wattlet3.png)

Hier finden Sie die gesamte Konfiguration Ihrer Geräte :

-   **Name der Wattlet-Ausrüstung** : Name Ihrer Wattlet-Ausrüstung
    auf dem Armaturenbrett,

-   **Übergeordnetes Objekt** : gibt das übergeordnete Objekt an, zu dem es gehört
    Ausrüstung,

-   **Aktivieren** : macht Ihre Ausrüstung aktiv,

-   **Sichtbar** : macht Ihre Ausrüstung auf dem Armaturenbrett sichtbar,

-   **Kategorie** : Kategorie Ihrer Wattlet-Ausrüstung

Sowie die folgenden Informationen :

-   **Adresse** : Moduladresse,

-   **Typ** : Wattlet-Modultyp,

-   **Softwareversion** : Modulinterne Softwareversion
    Wattlet,

-   **Hardwareversion** : Hardwareversion

> **Notiz**
>
> Bestellungen werden automatisch erstellt, das ist nicht nötig
> Fügen Sie sie manuell hinzu.

Wattcube Web Konfiguration 
=============================

Um Statusrückgaben abzurufen, muss eine Konfiguration durchgeführt werden
Push-Benachrichtigungen im Wattcube Web.

Wechseln Sie in der Wattcube-Weboberfläche zur Registerkarte "Einstellungen""
dann Menü "Anpassung der Bestellung"
image::../images/wattlet4.png \ [\]

Geben Sie im Bereich "PUSH Notification" die Jeedom-Adresse unter ein
Form :

**IP\_JEEDOM / plugins / wattlet / core / php / jeeWattlet.php?id = ~ id ~ & cmd = ~ cmd ~ & state = ~ state ~**

dann speichern.

![wattlet5](../images/wattlet5.png)
