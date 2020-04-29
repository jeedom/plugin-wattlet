Este complemento le permite controlar los módulos Wattcubes de Wattlet a través de
Wattcube Web.

Configuración del plugin 
=======================

Después de descargar el complemento, solo necesita activarlo,
luego configure la dirección IP de Wattcube Web.

![wattlet](../images/wattlet.png)

Configuración del equipo 
=============================

Se puede acceder a la sincronización de los equipos de Wattlets desde
Menú de complementos :

![wattlet2](../images/wattlet2.png)

Una vez que haces clic en uno de ellos, obtienes :

![wattlet3](../images/wattlet3.png)

Aquí encontrarás toda la configuración de tu equipo :

-   **Nombre del equipo de wattlet.** : nombre de su equipo Wattlet
    en el tablero,

-   **Objeto padre** : indica el objeto padre al que pertenece
    equipo,

-   **Activer** : activa su equipo,

-   **Visible** : hace que su equipo sea visible en el tablero,

-   **Categoría** : categoría de su equipo Wattlet

Así como la siguiente información :

-   **Adresse** : Dirección del módulo,

-   **Type** : Tipo de módulo Wattlet,

-   **Versión de software** : Versión de software interno del módulo
    Wattlet,

-   **Versión de hardware** : Versión de hardware

> **Note**
>
> Los pedidos se crean automáticamente, no hay necesidad de
> agregarlos manualmente.

Configuración web de Wattcube 
=============================

Para recuperar devoluciones de estado, es necesario configurar
Notificaciones push en la web de Wattcube.

En la interfaz web de Wattcube, vaya a la pestaña "Preferencias""
luego menú "Personalización del pedido"
image::../images/wattlet4.png \ [\]

En el área "Notificación PUSH", ingrese la dirección Jeedom debajo de
forma :

**IP\_JEEDOM / plugins / wattlet / core / php / jeeWattlet.php?id = ~ id ~ & cmd = ~ cmd ~ & state = ~ state ~**

luego guardar.

![wattlet5](../images/wattlet5.png)
