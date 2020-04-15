<?php
inclureModeleExercice();
	if(isset($_POST['idExerciceSupp'])){
			if(deleteExercice($_POST['idExerciceSupp']) && deleteConcerne($_POST['idExerciceSupp']))
			{
				include(CHEMIN_MODULE_EXERCICES."v_deleteExerciceConfirm.php");
			}
			else
			{
				include(CHEMIN_MODULE_EXERCICES."v_erreurExercice.php");
			}
		}
	elseif (isset($_POST['idExerciceModif'])){
			include(CHEMIN_MODULE_EXERCICES."c_modifExercice.php");
		}

	else
	{
		//Affichage du formulaire de filtrage
		$res = selectAllNiveau();
		$tabRes = $res->fetchAll();
		$listeDeroulanteNiveauxEtude="";
		foreach($tabRes as $ligne) {
			$listeDeroulanteNiveauxEtude .=  "\t<option value='".$ligne[0]."'>".$ligne[1]."</option>\n";
		}
		$listeDeroulanteNiveauxEtude .= "\t<option value='3'>1ère et 2ème année</option>\n";

		$res = selectAllDifficulte();
		$tabRes = $res->fetchAll();
		$listeDeroulanteDifficulte="";
		foreach($tabRes as $ligne) {
			$listeDeroulanteDifficulte .=  "\t<option value='".$ligne[0]."'>".$ligne[1]."</option>\n";
		}

		include(CHEMIN_MODULE_EXERCICES."v_FilterExerciceForm.php");
		if(isset($_POST['validFilter'])){
			if(isset($_POST['difficulte'])){
					$res=selectFilterExercice($_POST['difficulte']);
			}
		}
		else{
			$res = selectAllExercice();
		}
		$allExercices = "";
		while ($row = $res->fetch()) {
			$dateAjout = date_change_format($row['dateAjoutExercice']);
			$resNiveau = selectNiveau($row['idExercice']);
			$resDifficult = selectDiffculte($row['idDifficulte']);
			if($rowDifficult = $resDifficult->fetch()){
				$difficulte = $rowDifficult['nomDifficulte'];
			}
			$allNiveaux = "";
			while ($rowNiveau = $resNiveau->fetch()){
				$allNiveaux .= $rowNiveau['nomNivEtude']." ";
			}
			$allExercices .= "
			<tr>
				<td>".$row['titreExercice']. "</td><td>". $dateAjout. "</td><td>".$allNiveaux."</td><td> ". $difficulte."</td>
				<td>
					<form method='post' action='index.php?page=consultExercice'>
						<input type='hidden' value='".$row['titreExercice']."'>
						<button type='submit' name='idExerciceModif' value='".$row['idExercice']."'>
							<img src='".CHEMIN_ICONES."edit.png'>
						</button>
					</form>
				</td>
				<td>
					<form method='post' action='index.php?page=consultExercice'>
						<button type='submit' name='idExerciceSupp' value='".$row['idExercice']."'>
							<img src='".CHEMIN_ICONES."delete.png'>
						</button>
					</form>
				</td>
			</tr>";
		}
	//appel de la vue
	include(CHEMIN_MODULE_EXERCICES."v_consulterExercices.php");
	}

?>
