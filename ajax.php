<?php

include('./includes/functions.php');

if(!empty($_GET['action'])) {

  $action = secu($_GET['action']);

  if($action == 'contact') {

    include('requetes/action_contact.php');

  }

}
