@component('mail::message')
# SE HA REGISTRADO EN VIVELA O VENDALA

Verifique su correo para poder navegar en nuestro sitio web, y realizar publicaciones.

@component('mail::button', ['url' => $details['link_verificacion']])
Verifique su correo
@endcomponent

GRACIAS,<br>
<a>https://www.vivelaovendela.com.pe</a>
@endcomponent
