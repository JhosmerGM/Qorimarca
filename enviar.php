<?php
// Verifica si el formulario fue enviado mediante método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // === 1. SANEAR LOS DATOS DEL FORMULARIO ===
  // Elimina espacios innecesarios y caracteres peligrosos
  $nombre = htmlspecialchars(trim($_POST["nombre"]));
  $correo = filter_var(trim($_POST["correo"]), FILTER_SANITIZE_EMAIL);
  $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

  // === 2. VALIDACIÓN BÁSICA ===
  // Comprueba que ningún campo esté vacío
  if (empty($nombre) || empty($correo) || empty($mensaje)) {
    echo "<script>alert('Por favor, completa todos los campos.'); window.history.back();</script>";
    exit;
  }

  // Comprueba que el correo electrónico sea válido
  if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Correo electrónico no válido.'); window.history.back();</script>";
    exit;
  }

  // === 3. CONFIGURACIÓN DEL CORREO ===
  $para = "jhosguem@hotmail.com"; // Reemplaza con tu correo real
  $asunto = "Nuevo mensaje de $nombre desde Q’orimara Web"; // Asunto del correo
  $contenido = "Nombre: $nombre\nCorreo: $correo\nMensaje:\n$mensaje"; // Cuerpo del mensaje

  // Cabeceras del correo (para que puedas responder al remitente directamente)
  $cabeceras = "From: $correo\r\nReply-To: $correo\r\n";

  // === 4. ENVÍO DEL CORREO ===
  if (mail($para, $asunto, $contenido, $cabeceras)) {
    
    // === OPCIÓN A: REDIRECCIÓN A WHATSAPP ===
    $mensajeWA = rawurlencode("Hola, soy $nombre.\nCorreo: $correo\nMensaje: $mensaje");
    $numeroWA = "+51918241062"; // Reemplaza con tu número real (con código de país, sin +)
    
    echo "<script>
      alert('Mensaje enviado correctamente.');
      window.location.href = 'https://wa.me/$numeroWA?text=$mensajeWA';
    </script>";

    // === OPCIÓN B: REDIRECCIÓN A PÁGINA DE GRACIAS ===
    /*
    echo "<script>
      alert('Mensaje enviado correctamente.');
      window.location.href = 'gracias.html';
    </script>";
    */

  } else {
    // Si hubo un error al enviar
    echo "<script>
      alert('Error al enviar el mensaje. Intenta más tarde.');
      window.history.back();
    </script>";
  }
}
?>
