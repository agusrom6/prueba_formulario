<?php

// validaciones
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $asunto = htmlspecialchars(trim($_POST["asunto"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    $destinatario = "agustinaromer6@gmail.com";
    $asunto_email = "Nuevo mensaje de contacto: ":

    $contenido = "Nombre: " . $nombre . "\r\n";
    $contenido .= "Asunto: " . $asunto . "\r\n";
    $contenido .= "Mensaje: " . $mensaje;

    // configurar encabezados adicionales
    // $headers = "From: no-reply@tudominio.com" . "\r\n";
    // $headers .= "Reply-To: " . $nombre . "\r\n";
    // $headers .= "X-Mailer: PHP/" . phpversion();

    // enviar el correo electronico
    if (mail($destinatario, $asunto_email, $contenido, $headers)) {
        echo "Mensaje enviado con exito!";
    } else {
        echo "Error al enviar el mensaje. Intente nuevamente";
    }

    echo "Nombre: " . $nombre . "<br>";
    echo "Asunto: " . $asunto . "<br>";
    echo "Mensaje: " . nl2br($mensaje) . "<br>";
} else {
    header("Location: formulario.html");
    exit();
}

?>