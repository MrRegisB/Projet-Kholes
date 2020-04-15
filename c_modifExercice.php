<?php
  if (isset($_POST['valid']))
  {
    inclureModeleExercice();

    if (!isset($_POST['idNiveau1A'])){
      $_POST['idNiveau1A']= "";
    }
    if (!isset($_POST['idNiveau2A'])){
      $_POST['idNiveau2A']= "";
    }
    if(!updateExercice($_POST['idExercice'], $_POST['titre'], $_POST['difficulte']))
    {
      include(CHEMIN_MODULE_EXERCICES."v_erreurExercice.php");
    }
    else {
      updateConcerne($_POST['idExercice'], $_POST['idNiveau1A'], $_POST['idNiveau2A']);
      include (CHEMIN_MODULE_EXERCICES."v_modifExerciceConfirm.php");
    }
  }
  else
  {
    $res = selectOneExercice($_POST['idExerciceModif']);
      if ($row = $res->fetch()) {
        $titre = $row['titreExercice'];
        $idDifficulte = $row['idDifficulte'];
      }
    $res = selectNiveau($_POST['idExerciceModif']);
    $niveauxEtude="";
    $isChecked1="";
    $isChecked2="";
    while ($row = $res->fetch()) {
      $niveauxEtude .= $row['idNivEtude'];
    }
      if ($niveauxEtude == "1A"){
        $isChecked1 = "checked";
      }
      elseif($niveauxEtude == "2A"){
        $isChecked2= "checked";
      }
      elseif ($niveauxEtude == "1A2A"){
        $isChecked1 = "checked";
        $isChecked2= "checked";
      }
    $listeDeroulanteDifficulte = bddToComboBoxWithSelectedValue("difficulte", "selectAllDifficulte", $idDifficulte);
    include(CHEMIN_MODULE_EXERCICES."v_modifExerciceForm.php");
  }
 ?>
