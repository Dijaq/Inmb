@component('mail::message')
# VIVALA O VENDALA

FELICIDADES tu propiedad: {{$details['titulo']}} ha sido publicada.

@component('mail::button', ['url' => $details['url']])
Presione aquí para poder ver su publicación
@endcomponent

GRACIAS POR SER PARTE DE VIVALA O VENDALA,<br>
<a>https://www.vivelaovendela.com.pe</a>
@endcomponent
