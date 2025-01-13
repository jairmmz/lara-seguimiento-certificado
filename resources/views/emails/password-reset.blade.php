{{-- Plantilla con diseño para enviar token para resetear contraseña --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
</head>

<body>
    <h1>Restablecer contraseña</h1>
    <p>Hemos recibido una solicitud para restablecer la contraseña de tu cuenta.</p>
    <p>Para continuar con el proceso, haz clic en el siguiente enlace:</p>
    <p><a href="{{ $url }}">Restablecer contraseña</a></p>
    <p>Si no has solicitado restablecer tu contraseña, puedes ignorar este mensaje.</p>
</body>

</html>
