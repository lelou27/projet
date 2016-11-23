<?php

$errors = array();
$success = false;

if(!empty($_POST['Envoyer'])) {

  $fullname = secu($_POST['fullname']);
  $email = secu($_POST['email']);
  $content = secu($_POST['content']);
  $isAjax = secu($_POST['isAjax']);

  $verif = verif($fullname, 5, 100, 'Votre nom');
  if(!empty($verif)) { $errors['fullname'] = $verif; }

  $verif = verif($email, 5, 120, 'Votre email');
  if(!empty($verif)) { $errors['email'] = $verif; }

  $verif = verif($content, 10, 100000, 'Votre message');
  if(!empty($verif)) { $errors['content'] = $verif; }

  if(count($errors) == 0) {

    $mail = new PHPMailer;

    $mail->setFrom($email, $fullname);
    $mail->addAddress('admin@contact.php');

    $mail->Subject = 'Demande d\'informations';
    $mail->Body = '<p>' . $content . '</p>';
    $mail->AltBody = $content;
    $success = true;
    $mail->send();

  }

}

if(!empty($isAjax) && $isAjax == true) {

  $response = array(
    'errors' => $errors,
    'success' => $success
  );

  $json = json_encode($response);
  header('content-type: application/json');
  die($json);

} else {

  redirect('index.php');

}
