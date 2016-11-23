<?php

include('./vendor/autoload.php');

function secu($val) {
  return trim(strip_tags($val));
}

function verif($val, $min, $max, $errmsg, $email = false) {

  $error = '';

  if(!empty($val)) {

    if(strlen($val) < $min) {

      $error = '* ' . $errmsg . ' est trop court.';
    }

    if(strlen($val) > $max) {

      $error = '* ' . $errmsg . ' est trop long.';

    }

    if($email == true) {

      if(filter_var($val, FILTER_VALIDATE_EMAIL) == false) {

        $error = '* ' . $errmsg . ' n\'est pas valide.';


      }

    }

  } else {

    $error = '* Veuillez renseigner ce champs.';

  }

  return $error;

}

function redirect($url) {
  header('Location: ' . $url);
  exit();
}
