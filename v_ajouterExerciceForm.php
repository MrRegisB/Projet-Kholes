<form method='post' action='index.php?page=ajoutExercice'>
	<label> Titre : </label><input type='text' name='titre'/><br/>
	<label> Difficulté : </label>
	<?php echo $listeDeroulanteDifficulte; ?><br/>
	<label> Niveau d'étude : </label> 1ère Année <input type='checkBox' name='idNiveau1A' value="1A"/> 2ème Année <input type='checkBox' name='idNiveau2A' value="2A"/><br/>
	<input type='submit' name='valid' value="Ajouter l'exercice"/>
</form>
