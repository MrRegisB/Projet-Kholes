<Javascript>
function confirmBoxDelete() {
  if (confirm("Êtes-vous sûr de vouloir supprimer cet exercice ?")){
    include(CHEMIN_MODULE_EXERCICES."c_deleteExercice.php");
  }
}
</Javascript>
