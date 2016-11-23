<?php

include('../vendor/autolad.php');

function secu($val) {
  return trim(strip_tags($val));
}

function verif($val, $min, $max, $errmsg, $mail = false) {

  $error = '';

  if(!empty($val)) {

    if(strlen($val) < $min) {

      $error = '* ' . $errmsg . ' est trop court.';
      return;
    }

    if(strlen($val) > $max) {

      $error = '* ' . $errmsg . ' est trop long.';
      return;

    }

    if($email == true) {

      if(filter_var($val, FILTER_VALIDATE_EMAIL) == false) {

        $error = '* ' . $errmsg . ' n\'est pas valide.';
        return;

      }

    }

  } else {

    $error = '* Veuillez renseigner ce champs.';
    return;

  }

  return $error;

}

function redirect($url) {
  header('Location: ' . $url);
  exit();
}
