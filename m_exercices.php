<?php
	function selectAllExercice()
	{
		$pdo = connecBDD();
		$stmt = $pdo->query("SELECT * FROM EXERCICE");
		$stmt->execute();
		return $stmt;

	}
	function selectOneExercice($idExercice)
	{
		$pdo = connecBDD();
		$query = "SELECT * FROM EXERCICE WHERE idExercice= :idExo";
		$req = $pdo->prepare($query);
		$req-> bindValue(":idExo", $idExercice);
		$req->execute();
		return $req;
	}
	function selectLastExercice()
	{
		$pdo = connecBDD();
		$stmt = $pdo->query("SELECT idExercice FROM EXERCICE where idExercice=(SELECT MAX(idExercice) from EXERCICE)");
		$stmt->execute();
		return $stmt;
	}
	function selectFilterExercice($idDifficulte){
		$pdo = connecBDD();
		$query = "SELECT * FROM EXERCICE WHERE idDifficulte= :idDifficulte";
		$req = $pdo->prepare($query);
		$req-> bindValue(":idDifficulte", $idDifficulte);
		$req->execute();
		return $req;
	}
	function insererExercice($titreExercice, $dateAjoutExercice, $idUtilisateur, $idDifficulte){
		$pdo = connecBDD();
		 $query = "INSERT INTO exercice(titreExercice, dateAjoutExercice, idUtilisateur, idDifficulte)
						VALUES(:titre, :dateAjout, :idUtilisateur, :idDifficulte)";
		$req = $pdo->prepare($query);
		$req-> bindValue(":titre", $titreExercice);
		$req-> bindValue(":dateAjout", $dateAjoutExercice);
		$req-> bindValue(":idUtilisateur", $idUtilisateur);
		$req-> bindValue(":idDifficulte", $idDifficulte);
		$req->execute();

		return $req;
	}
	function deleteExercice($idExercice){
		$pdo = connecBDD();
		$query = "DELETE FROM exercice WHERE idExercice = :exercice";
		$req = $pdo->prepare($query);
		$req-> bindValue(":exercice", $idExercice);
		$req->execute();
		return $req;

	}
	function deleteConcerne($idExercice){
		$pdo = connecBDD();
		$query = "DELETE FROM concerne WHERE idExercice = :exercice";
		$req = $pdo->prepare($query);
		$req-> bindValue(":exercice", $idExercice);
		$req->execute();
		return $req;
	}
	function updateConcerne($idExercice, $idNiveau1, $idNiveau2){
		deleteConcerne($idExercice);
		if ($idNiveau1 != ""){
			insererConcerne($idExercice, $idNiveau1);
		}
		if($idNiveau2 != ""){
			insererConcerne($idExercice, $idNiveau2);
		}
	}
	function updateExercice($idExercice, $titreExercice ,$idDifficulte){
		$pdo = connecBDD();
		$query = "UPDATE exercice SET titreExercice = :titreExo, idDifficulte = :idDifficult WHERE idExercice = :idExo";
		$req = $pdo->prepare($query);
		$req-> bindValue(":titreExo", $titreExercice); //Forcer et préciser le type ?
		$req-> bindValue(":idDifficult", $idDifficulte, PDO::PARAM_INT);
		$req-> bindValue(":idExo", $idExercice, PDO::PARAM_INT);
		$req->execute();
		return $req;

	}
	function updateNiveau($idExercice, $idNiveau){
		$pdo = connecBDD();
		$query = "UPDATE concerne SET idNivEtude = :idNiveau WHERE idExercice = :idExo";
		$req = $pdo->prepare($query);
		$req-> bindValue(":idNiveau", $idNiveau);
		$req-> bindValue(":idExo", $idExercice);
		$req->execute();
	}
	function insererConcerne($idExercice, $idNiveau)
	{
			$pdo = connecBDD();
			$query = "INSERT INTO concerne(idExercice, idNivEtude)
								VALUES(:idExercice, :idNivEtude)";
			$req = $pdo->prepare($query);
			$req-> bindValue(":idExercice", $idExercice);
			$req-> bindValue(":idNivEtude", $idNiveau);
			$req->execute();
			return $req;
	}
	function selectNiveau($idExercice)
	{
	  $pdo = connecBDD();
	  $query = "SELECT N.nomNivEtude, N.idNivEtude FROM concerne C, nivEtude N WHERE C.idExercice = ".$idExercice." AND C.idNivEtude = N.idNivEtude";
	  $req = $pdo->prepare($query);
	  $req-> bindValue(":idExercice", $idExercice);
	  $req->execute();
	  return $req;
	}
	function selectAllNiveau()
	{
		$pdo = connecBDD();
		$stmt = $pdo->query("SELECT * FROM nivEtude");
		$stmt->execute();
		return $stmt;
	}
	function selectAllDifficulte()
	{
		$pdo = connecBDD();
	  $stmt = $pdo->query("SELECT * FROM difficulte");
	  $stmt->execute();
	  return $stmt;
	}
	function selectDiffculte($idDifficulte)
	{
		$pdo = connecBDD();
	  $stmt = $pdo->query("SELECT nomDifficulte FROM difficulte WHERE idDifficulte = $idDifficulte");
	  $stmt->execute();
	  return $stmt;
	}
?>
