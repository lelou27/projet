<?php
include 'includes/header.php';
?>
<section class="container">
  <form id="form_contact" class="form_contact col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-xs-12" action="ajax.php?action=contact" method="POST">

    <div id="error_fullname" class="hidden"></div>
    <label for="fullname">Nom :</label>
    <input type="text" name="fullname" value="">

    <div id="error_email" class="hidden"></div>
    <label for="email">Email :</label>
    <input type="email" name="email" value="">

    <div id="error_content" class="hidden"></div>
    <label for="content">Content :</label>
    <textarea name="content" rows="6" cols="80"></textarea>

    <input class="submit btn btn-primary" type="submit" name="Envoyer">
  </form>

</section>

<?php
include 'includes/footer.php';
?>
