<?php
  if(isset($_SESSION['message'] )  ) {
    if($_SESSION['etat'] == "Succès" ){
        echo '<div class="alert alert-success" role="alert">';
    }
    else{
        echo '<div role="alert" class="alert alert-danger">';
    }
    echo $_SESSION['message'];
    echo '</div>';
  }
?>
