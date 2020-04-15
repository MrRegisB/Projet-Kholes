<?php
	function connecBDD() {
		$pdo = new PDO('mysql:host=localhost; dbname=exomaths; charset=utf8', 'root', '');
		return $pdo;
	}
	//fonctions d'inclusion
	function inclureModeleExercice() { include(CHEMIN_MODULE_EXERCICES."m_exercices.php"); }
	function inclureFonctionsJs() { include(CHEMIN_LIBRARY."fonction.js"); }
	function inclureClass() { include(CHEMIN_MODULE_EXERCICES."class.php");}
	//fonction qui retourne le code HTML d'une liste déroulante contenant les données d'une table résultat
	//$nomListe : nom de la liste déroulante au sein du formulaire (valeur de l'attribut "name" de la balise <select>)
	//$fonctionModele : fonction du modèle qui va retourner la ressource mysqli_query correspondant à l'exécution de la requête SQL SELECT
	//contenant comme 1er champ les valeurs (attribut "value" de la balise option), et comme 2ème champ les valeurs affichées (entre les balises <option> et </option>)
	function bddToComboBox($nomListe, $fonctionModele) {
		$res = $fonctionModele();
		$tabRes = $res->fetchAll();
		$listeDeroulante = "<select name='$nomListe'>\n";
		foreach($tabRes as $ligne) {
			$listeDeroulante .=  "\t<option value='".$ligne[0]."'>".$ligne[1]."</option>\n";
	}
		$listeDeroulante .= "</select>";
		return $listeDeroulante;
	}
	function bddToComboBoxWithSelectedValue($nomListe, $fonctionModele, $selectedValue) {
		$res = $fonctionModele();
		$tabRes = $res->fetchAll();
		$listeDeroulante = "<select name='$nomListe'>\n";
		foreach($tabRes as $ligne) {
			if ($ligne[0] == $selectedValue){
				$listeDeroulante .=  "\t<option value='".$ligne[0]."' selected='selected'>".$ligne[1]."</option>\n";
			}
			else{
				$listeDeroulante .=  "\t<option value='".$ligne[0]."'>".$ligne[1]."</option>\n";
			}
		}
		$listeDeroulante .= "</select>";
		return $listeDeroulante;
	}
	//Change le format de la date reçue en paramètre
	//Par défaut : EN(bdd) to FR
	function date_change_format($ladate,$from='Y-m-d', $to='d/m/Y'){ // PHP > 5.3
		if($ladate !=''){
			$date = DateTime::createFromFormat($from, $ladate);
			return $date->format($to);
		}else{
			return "";
		}
	}
?>
