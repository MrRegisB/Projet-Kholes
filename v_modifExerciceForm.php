<form method='post' action='index.php?page=modifExercice'>
	<label> Titre : </label><input type='text' name='titre' value=<?php echo $titre; ?> /> <br/>
	<label> Difficulté : </label>
	<?php echo $listeDeroulanteDifficulte; ?><br/>
	<label> Niveau d'étude : </label> 1ère Année <input type='checkBox' name='idNiveau1A' value="1A" <?php echo $isChecked1; ?> /> 2ème Année <input type='checkBox' name='idNiveau2A' value="2A" <?php echo $isChecked2; ?>/><br/>
	<input type='hidden' name='idExercice' value ='<?php echo $_POST['idExerciceModif']; ?>' />
	<input type='submit' name='valid' value="Modifier l'exercice"/>
</form>
