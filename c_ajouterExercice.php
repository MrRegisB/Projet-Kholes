<?php
	inclureModeleExercice();
	//si le formulaire n'est pas validé
	if(!isset($_POST['valid']))
	{
		$listeDeroulanteDifficulte = bddToComboBox("difficulte", "selectAllDifficulte");
		include(CHEMIN_MODULE_EXERCICES."v_ajouterExerciceForm.php");
	}
	elseif(isset($_GET['modif']))
	{
		echo ($_POST["idExerciceModif"]);
	}
	else
	{
		//Date du jour en format anglais pour enregistrement en base
		$dateAjout = 	date('Y/m/d', time());
		$exercice = new Exercice($_POST['titre'], $dateAjout, $_SESSION['idUtilisateur'], $_POST['difficulte']);
		if(insererExercice($exercice->getTitre(), $exercice->getDtAjout(), $exercice->getIdUtilisateur(), $exercice->getIdDifficulte())){
			include(CHEMIN_MODULE_EXERCICES."v_ajouterExerciceConfirm.php");
		}
		$res = selectLastExercice();
		if ($row = $res->fetch()) {
			$idExerciceCreated = $row['idExercice'];
		}
		if (isset($_POST['idNiveau1A'])){
			insererConcerne($idExerciceCreated, $_POST['idNiveau1A']);
		}
		if (isset($_POST['idNiveau2A'])){
			insererConcerne($idExerciceCreated, $_POST['idNiveau2A']);
		}
	}
?>
