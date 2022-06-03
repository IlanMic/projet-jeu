<!-- Header/Navbar -->
<?php
    $titre_page = "Nous contacter";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<div class="personnage-creation-form-container">
    <!-- Formulaire de contact -->
    <form class="contact-form" action="Controllers/contact.php">
        <div class="label-connexion-head">
            <h1>Nous contacter</h1>
            <hr>
            <h3>Veuillez saisir les informations obligatoires (*) afin de créer votre personnage: <h2>
            <br>
        </div>
        <div class="connexion-content">
            <div class="row">
                <div class="mb-4">
                    <label for="mail" class="form-label">Pseudo *:</label><br>
                    <input type="email" id="mail" class="form-control" name="mail" placeholder="Entrez votre adresse mail..." required>
                </div>
                <div class="mb-4">
                        <label for="message">Votre message:</label>
                        <br>
                        <textarea maxlength="300" name="message" placeholder="Saisissez votre message..." class="textarea-bibliographie" cols="100%" rows="5%"></textarea>
                    <div class="text-center mt-4 mb-3">
                        <button type="submit" name="submit" class="form-btn">Envoyer votre message</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>
