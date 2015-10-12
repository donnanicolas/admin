# Admin

Está aplicación permite controlar las zonas (DNS) y casillas de mail.

## Aplicación

La misma fue desarrollada en [Laravel](http://laravel.com/)

## DNS

Maneja la creación de zonas, y sus registros.

Luego de crear una zona y sus registros se pueden probar las mismas corriendo:

```
dig @[ip del server] [dominio] [registro]
```

## Casillas de mail

**Atención: Solo maneja la creación de E-Mails, se debe usar un cliente POP3 para verlos y SMTP para enviarlos**

Se puede crear dominios y casillas para los mismos.
