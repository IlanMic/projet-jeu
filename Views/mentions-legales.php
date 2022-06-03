<!-- Header/Navbar -->
<?php
    $titre_page = "Mentions légales - ";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<!-- Container avec les mentions légales -->
<div class="container-informations">
  <!-- Contenu des mentions légales -->
  <div class="informations-mentions-legales">
    <div class="informations-header">
      <div id="informations-header-title">
        <h2>Mentions légales</h2>
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