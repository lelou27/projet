<?php

$errors = array();
$success = false;

if(!empty($_POST['Envoyer'])) {

  $fullname = secu($_POST['fullname']);
  $email = secu($_POST['email']);
  $content = secu($_POST['content']);
  $isAjax = secu($_POST['isAjax']);

  $verif = verif($fullname, 5, 100, 'Votre nom');
  if(!empty($verif)) { $errors['nickname'] = $verif; }

  $verif = verif($email, 5, 120, 'Votre email');
  if(!empty($verif)) { $errors['email'] = $verif; }

  $verif = verif($content, 10, 100000, 'Votre message');
  if(!empty($verif)) { $errors['content'] = $verif; }

  if(count($errors) == 0) {

    $mail = new PHPMailer;

    $mail->setFrom($email, $nickname);
    $mail->addAdress('admin@contact.php');

    $mail->Subject = 'Demande d\'informations';
    $mail->Body = '<p>' . $content . '</p>';
    $mail->AltBody = $content;

    if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

  }

}

if(!empty($isAjax) && $isAjax == true) {

  $response = array(
    'errors' => $errors,
    'success' => $success
  );

  $json = json_encode($response);
  die($json);

} else {

  redirect('index.php');

}
