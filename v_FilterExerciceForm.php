<form method='post' action='index.php?page=consultExercice'>
	<label> Difficulté : </label>
	<select name='difficulte'>
    <option disabled selected value> -- Sélectionnez la difficulté -- </option>
		<?php echo $listeDeroulanteDifficulte; ?>
	</select>
	<label> Niveaux d'étude : </label>
	<select name='niveau'>
    <option disabled selected value> -- Sélectionnez le(s) niveaux -- </option>
		<?php echo $listeDeroulanteNiveauxEtude; ?>
	</select>
	<input type='submit' name='validFilter' value="Filtrer"/>
</form>
<?php /*<label> Niveau d'étude : </label> 	<?php echo $listeDeroulanteNiveauxEtude; ?>
 ?>";*/ ?>
