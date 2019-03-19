<?php
    session_start(); /* Démarrage session issue de contact.php (info erreurs) */
?>

<!doctype html>
<html lang="en">



<!-- HEAD -->

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Style.css">

    <title>Mon site / Formulaire</title>
  </head>



<!-- BODY -->

  <body>
    

    <!-- Formulaire -->


    <div class="container">

        <div class="starter-template">

            <?php /* Si erreur dans la table SESSION, alors affichage des erreurs */
                if(array_key_exists('errors', $_SESSION)): ?>
                    <div class="alert alert-danger">
                        <?= implode('<br>', $_SESSION['errors']); /* implode = affiche chaine de caractère depuis tableau */ ?> 
                    </div>
            <?php endif; /* disparition des erreurs après actualisation*/?>

            <?php 
                if(array_key_exists('success', $_SESSION)): ?>
                    <div class="alert alert-success">Your email has been sent with success</div>
            <?php endif;?>

            <!-- Renvoi des données vers la page contact.php" 
                    GET : arguments envoyés par url
                    POST : arguments non envoyés -->
            <form action="contact.php" method="POST"> 
            <div class="row">

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="inputfirstname">First name</label>
                        <input type="text" name="firstname" class="form-control" id="inputfirstname"  value="<?= isset($_SESSION['inputs']['firstname']) ? $_SESSION['inputs']['firstname']:''; ?>">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="inputsurname">Surname</label>
                        <input type="text" name="surname" class="form-control" id="inputsurname"  value="<?= isset($_SESSION['inputs']['surname']) ? $_SESSION['inputs']['surname']:''; ?>">
                    </div>
                </div>

                <div class="col-lg-12">
                <div class="form-group">
                    <label for="inputemail">e-mail</label>
                    <input type="email" name="email" class="form-control" id="inputemail" value="<?= isset($_SESSION['inputs']['email']) ? $_SESSION['inputs']['email']:''; ?>">
                </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="inputphone">Phone</label>
                        <input type="tel" name="phone" class="form-control" id="inputphone" value="<?= isset($_SESSION['inputs']['phone']) ? $_SESSION['inputs']['phone']:''; ?>">
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="inputservice">Subject : </label>
                        <select class="service" name="inputservice">
                        <option value="0">Contact me for a private appointment</option>
                        <option value="1">Give an idea to save the morld </option>
                        <option value="2">Post a message cause you don't know what to do</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="inputmessage">Your message</label>
                        <textarea type="text" name="message" class="form-control" id="inputmessage" rows="5"  value="<?= isset($_SESSION['inputs']['message']) ? $_SESSION['inputs']['message']:''; ?>"></textarea>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="button">
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </div>

            </div>
            </form>


        </div>
    </div>




    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php
unset($_SESSION['inputs']);
unset($_SESSION['success']);
unset($_SESSION['errors']);

?>