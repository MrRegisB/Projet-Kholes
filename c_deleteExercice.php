<?php
include(CHEMIN_LIBRARY."fonctions.php");
inclureModeleExercice();
/*
$listeDeroulanteExercice = bddToComboBox("Exercice", "selectAllExercice");
include (CHEMIN_MODULE_EXERCICES."v_modifierExercice.php");
*/
if (isset($_POST['valid']))
{
  echo "Suppression : " . $_POST['valid'];
  if(deleteExercice($_POST['valid'])){
    echo "L'exercice a bien été supprimé";
  }
}
else
{
  echo "Erreur";
}
 ?>
