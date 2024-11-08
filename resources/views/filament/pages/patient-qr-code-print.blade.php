@php
use chillerlan\QRCode\QRCode;
@endphp


<div style="width: 100%; height: 100vh; display: flex; align-items: center; justify-content: center">
    <img style="width: 50%;" src="{{(new QRCode)->render($qrCode)}}" alt="QR Code" />
</div>

<script>
    window.print();
</script>

