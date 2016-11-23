<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Contact</title>
  </head>
  <body>
    <header class="navbar navbar-inverse">
      <h1>Notre super site avec Git</h1>
    </header>
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



  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/ajax.js"></script>
  </body>
</html>
