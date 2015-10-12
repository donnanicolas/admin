# Admin

Está aplicación permite controlar las zonas (DNS) y casillas de mail.

## Aplicación

La misma fue desarrollada en [Laravel](http://laravel.com/)

Utiliza como base:

* DNS:[PowerDns](https://www.powerdns.com/) y [PowerAdmin](http://www.poweradmin.org/)
* Mailbox: [postfix](http://www.postfix.org/) y [postfixAdmin](http://postfixadmin.sourceforge.net/)

Utiliza las bases de datos de estos sistemas para configurar los dominios y las casillas

## Demo

La aplicación está corriendo en http://admin.donnanicolas.com.ar/

## DNS

Maneja la creación de zonas, y sus registros.

Luego de crear una zona y sus registros se pueden probar las mismas corriendo:

```
dig @[ip del server] [dominio] [registro]
```

## Casillas de mail

**Atención: Solo maneja la creación de E-Mails, se debe usar un cliente POP3 para verlos y SMTP para enviarlos**

Se puede crear dominios y casillas para los mismos.

### Utilizar las casillas de mail

Para probar las casillas de mails se puede ingresar a https://donnanicolas.com.ar/roundcube/
