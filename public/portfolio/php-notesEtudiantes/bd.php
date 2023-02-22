<?php
//tableaux de données 
$NotesGroupe1 = array(
    "HARG200181" => array("Guillaume", "Harvey", "M", 36, 90, 70, 76),
    "CHAM010283" => array("Marc-André", "Charpentier", "M", 34, 80, 73, 96),
    "TREV290991" => array("Valérie", "Tremblay", "F", 26, 70, 71, 69),
    "PELL180584" => array("Laurence", "Pelletier", "F", 30, 65, 89, 76),
    "MALF110194" => array("Francis", "Maltais", "M", 20, 61, 50, 59),
    "GAUM220654" => array("Martine", "Gauthier", "F", 60, 65, 40, 76)
    );
$NotesGroupe2 = array(
    "GIRM230383" => array("Marc-Olivier", "Girard", "M", 31, 75, 85, 56),
    "TREM300878" => array("Michel", "Tremblay", "M", 36, 50, 50, 55),
    "POID250468" => array("Diane", "Poitras", "F", 46, 61, 75, 59),
    "LEML180586" => array("Laurence", "Lemieux", "F", 31, 80, 89, 100),
    "VANL130395" => array("Jeff", "Van Cleef", "M", 19, 61, 68, 33)
    );

    //variables du travail par Note et Recherche matricule--------------------------------------------------

    $groupeSelect=[];
    $prenom = "";
    $nom = "";
    $sex = "";
    $age = 0;
    $tp1 = 0;
    $tp2 = 0;
    $tp3 = 0;
    $note = 0;
    $moyenne = 0;
    $note = 0;
    $sommeNote = 0;

    //variables de travail final----------------------------------------------------------------
    $prenom = "";
    $nom = "";
    $genre = "";
    $note = 0;
    $moyenne = 0;
    $sommeNote = 0;
    $groupeChoix=[];
    $j=0;

?>