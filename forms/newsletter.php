<?php
$receiving_email_address = 'gbrlescalada@gmail.com'; // Cambiar por tu email

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Error: No se encontró la librería PHP Email Form');
}

$newsletter = new PHP_Email_Form;
$newsletter->ajax = true;
$newsletter->to = $receiving_email_address;
$newsletter->from_name = $_POST['email'];
$newsletter->from_email = $_POST['email'];
$newsletter->subject = "Nueva Suscripción: " . $_POST['email'];

$newsletter->add_message($_POST['email'], 'Email');

echo $newsletter->send();
?>