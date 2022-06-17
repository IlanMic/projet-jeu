<?php
  if(isset($_SESSION['message']) && isset($_SESSION['etat']) && $_SESSION['etat']!= "") {
    if($_SESSION['etat'] == "Succès" ){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alertDiv">';
    }
    else{
        echo '<div role="alert" class="alert alert-danger alert-dismissible fade show" id="alertDiv">';
    }
    echo $_SESSION['message'];
    echo '<button type="button" class="close-btn" data-dismiss="alert" aria-label="Close">
    &times;
    </button>';
    echo '</div>';
    unset($_SESSION['etat']);
  }
?>
