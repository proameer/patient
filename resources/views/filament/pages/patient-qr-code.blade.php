@php
use chillerlan\QRCode\QRCode;
@endphp

<img style="width: 100px; margin: 10px; " src="{{(new QRCode)->render($getState())}}" alt="QR Code" />


