@component('mail::message')
# HA SOLICITADO UN CAMBIO DE CONTRASEÑA

Presione en el botón si desea recuperar su contraseña

@component('mail::button', ['url' => $details['link_recuperacion']])
Recuperar de Contraseña
@endcomponent

GRACIAS,<br>
<a>https://www.vivelaovendela.com.pe</a>
@endcomponent
