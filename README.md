## Acerca de esta API

Esta es una API RESTful construida con Laravel para una aplicación de planificación de eventos. La API incluye un servicio de autenticación con Laravel Sanctum para proteger las rutas y recursos. Las principales funcionalidades son:

- Gestión de usuarios (registro, inicio de sesión, perfil)
- Gestión de eventos (creación, edición, eliminación, listado)
- Gestión de invitados para eventos
- Notificaciones para usuarios sobre eventos próximos

## Uso de la API

La API sigue los principios de REST y utiliza JSON como formato de datos. Todas las rutas están protegidas excepto las de registro y inicio de sesión. Para autenticarse, se debe obtener un token de acceso personal mediante el endpoint de inicio de sesión.

Una vez autenticado, se pueden realizar solicitudes a los distintos endpoints para gestionar eventos, invitados y obtener notificaciones.

## Documentación

La documentación detallada de los endpoints, solicitudes y respuestas se encuentra disponible en [ruta/a/documentacion].

## Contribución

Si deseas contribuir a este proyecto, por favor revisa la [guía de contribución](https://laravel.com/docs/contributions) de Laravel.

## Código de Conducta

Para garantizar que la comunidad de Laravel sea acogedora para todos, por favor revisa y respeta el [Código de Conducta](https://laravel.com/docs/contributions#code-of-conduct).

## Seguridad

Si descubres una vulnerabilidad de seguridad dentro de Laravel, por favor envía un correo electrónico a Taylor Otwell vía [taylor@laravel.com](mailto:taylor@laravel.com). Todas las vulnerabilidades de seguridad serán tratadas con prontitud.

## Licencia

El framework Laravel es un software de código abierto bajo la [licencia MIT](https://opensource.org/licenses/MIT).
