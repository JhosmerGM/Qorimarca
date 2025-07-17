<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = htmlspecialchars($_POST["nombre"]);
  $correo = htmlspecialchars($_POST["correo"]);
  $mensaje = htmlspecialchars($_POST["mensaje"]);

  $para = "contacto@qorimara.pe"; // cambia por tu correo real
  $asunto = "Nuevo mensaje de $nombre desde Q’orimara Web";
  $contenido = "Nombre: $nombre\nCorreo: $correo\nMensaje:\n$mensaje";

  if (mail($para, $asunto, $contenido)) {
    echo "<script>alert('Mensaje enviado correctamente.');window.history.back();</script>";
  } else {
    echo "<script>alert('Error al enviar el mensaje.');window.history.back();</script>";
  }
}
?>
