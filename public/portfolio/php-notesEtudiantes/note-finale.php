<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes finales</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <nav class="navigation-test">
        <button class="glow-on-hover" type="button"><a href="index.html" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Accueil</a></button>
        <button class="glow-on-hover" type="button"><a href="note-par-travail.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Notes par travail</a></button>
        <button class="glow-on-hover" type="button"><a href="note-finale.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Notes finales</a></button>
        <button class="glow-on-hover" type="button"><a href="recherche-par-etudiant.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Recherche par étudiant</a></button>
    </nav>

    <?php //déclarations de variables utilisées dans le formulaire plus bas
        $echec = "";
        $groupeUser = "";
        $sexe = "";
        $checked = "";
        if(isset($_GET["leCheckBox"]))
            $echec = $_GET["leCheckBox"];
        if(isset($_GET["leSelectGroupe"]))
            $groupeUser = $_GET["leSelectGroupe"];
        if(isset($_GET["leRadio"]))
            $sexe = $_GET["leRadio"];
        if(isset($_GET["leCheckBox"]))
        {
            $checked= "checked";
        }

    ?>
    <h1>Notes finales par sous-groupe d'étudiants</h1>

    <form method="GET"> 
        <ul class="form-style-1">
            <li>
                <label>Sélectionner le (ou les) groupe(s) <span class="required">*</span></label>
                <select class="field-long" name="leSelectGroupe"><!--pas sélect multiple, mais je n'ai pas renommé ma variable-->
                    <option value = "0">- Choisissez le groupe -</option>
                    <option value = "1" <?php if($groupeUser == 1) echo "selected"; ?>>Groupe 1</option>
                    <option value = "2" <?php if($groupeUser == 2) echo "selected"; ?>>Groupe 2</option>
                    <option value = "3" <?php if($groupeUser == 3) echo "selected"; ?>>Les deux groupes</option>
                </select>
            </li>
            <li>
                <div>
                    <label>Cochez la case pour afficher seulement les étudiants en situation d'échec<span class="required">*</span></label>
                        <input type="hidden" name="leCheckBox" value="0"/>
                        <input type="checkbox" name="leCheckBox" value="1" <?php if($echec ==1) echo "checked"; ?>/>
                </div>
            </li>
            <li>
                <label id="radio-btn">Choisissez le (ou les) sexe(s)<span class="required">*</span></label>
                <div>
                    <label>Femme</label>
                        <input type="radio" name="leRadio" value="1"<?php if($sexe == 1) echo "checked"; ?>>
                </div>
                <div>
                    <label>Homme</label>
                        <input type="radio" name="leRadio" value="2"<?php if($sexe == 2) echo "checked"; ?>>
                </div>
                <div>
                    <label>Les deux sexes</label>
                        <input type="radio" name="leRadio" value="3"<?php if($sexe == 3) echo "checked"; ?>>
                </div>
            </li>
            <li class="form-style-1">
                <input type="submit" name="btnSubmit" value="Envoyer"  class="button-contact"/>
            </li>
        </ul>
    </form>
    <?php
    require_once("fonctions-02.php"); //Connecter à la page fonction-02 pour envoie d'informations de requête du user et traitement
    if(isset($_GET["btnSubmit"]))
    {
        if(!($_GET["leSelectGroupe"]) || ($_GET["leRadio"])==0)
        {
            echo "<h3 style=\"text-align: center\">Veuillez choisir le groupe ainsi que le sexe des étudiants dont vous voulez voir les notes.  <br> Si vous désirez afficher seulement les étudiants en situation d'échec, cochez la case.</h3>";
        }
        elseif(isset($_GET["leSelectGroupe"], $_GET["leRadio"], $_GET["leCheckBox"]))
        {
            $sexe=$_GET["leRadio"];
            $groupeUser = $_GET["leSelectGroupe"];
            $echec = $_GET["leCheckBox"];
            $tableauNotesFinalesEchecs=notesFinales($groupeUser, $sexe, $echec); //Appel de la fonction
            echo $tableauNotesFinalesEchecs;
        }
        
    }
    
    ?>



</body>
</html>


<!--        if(isset($_GET["leSelectGroupe"], $_GET["leRadio"], $_GET["leCheckBox"]))
        {
            $sexe=$_GET["leRadio"];
            $groupeUser = $_GET["leSelectGroupe"];
            if(isset($_GET["leCheckBox"]))
            {
                $echec = $_GET["leCheckBox"];
                $tableauNotesFinalesEchecs=notesFinalesEchecs($sexe, $groupeUser, $echec);
                echo $tableauNotesFinalesEchecs;
            }
            else
            {
                $tableauNotesFinales=notesFinales($groupeUser, $sexe);
                echo $tableauNotesFinales;
            }
        }-->