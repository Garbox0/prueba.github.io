<?php
$receiving_email_address = 'gbrlescalada@gmail.com'; // Cambiar por tu email

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Error: No se encontró la librería PHP Email Form');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;
$contact->to = $receiving_email_address;
$contact->from_name = $_POST['name'];
$contact->from_email = $_POST['email'];
$contact->subject = $_POST['subject'];

// Configuración SMTP (opcional)
/*
$contact->smtp = array(
  'host' => 'smtp.ejemplo.com',
  'username' => 'usuario',
  'password' => 'contraseña',
  'port' => '587'
);
*/

$contact->add_message($_POST['name'], 'Nombre');
$contact->add_message($_POST['email'], 'Email');
$contact->add_message($_POST['message'], 'Mensaje', 10);

echo $contact->send();
?>