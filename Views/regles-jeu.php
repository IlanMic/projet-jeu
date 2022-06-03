<!-- Header/Navbar -->
<?php
    $titre_page = "Règles du jeu - ";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<!-- Container avec les règles du jeu -->
<div class="container-informations">
  <!-- Contenu des règles du jeu -->
  <div class="informations-regles-jeu">
    <div class="informations-header">
      <div id="informations-header-title">
        <h2>Règles du jeu</h2>
      </div>
      <hr>
      <p class="informations-header-content">N/A</p>
    </div>
  </div>
</div>



<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>