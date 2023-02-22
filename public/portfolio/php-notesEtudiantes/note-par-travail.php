<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes par travail</title>
    <link rel="stylesheet" href="css/stylesheet.css"><!--Pour la plupart du style -->
</head>
<body>
    <nav class="navigation-test">
        <button class="glow-on-hover" type="button"><a href="index.html" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Accueil</a></button>
        <button class="glow-on-hover" type="button"><a href="note-par-travail.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Notes par travail</a></button>
        <button class="glow-on-hover" type="button"><a href="note-finale.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Notes finales</a></button>
        <button class="glow-on-hover" type="button"><a href="recherche-par-etudiant.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Recherche par étudiant</a></button>
    </nav>

    <?php
        $selectGroupe = "";
        $selectTP = "";
        if(isset($_GET["selectGroupe"]))
        {
            $selectGroupe = $_GET["selectGroupe"];
        }
        if(isset($_GET["selectTP"]))
        {
            $selectTP = $_GET["selectTP"];
        }
    ?>
    <h1>Notes pour les travaux par groupe d'étudiants</h1>

    <form method="GET"> 
                <ul class="form-style-1">
                    <li>
                        <label>Sélectionner le groupe <span class="required">*</span></label>
                        <select name="selectGroupe" class="field-long">
                            <option value = "0">- Choisissez -</option>
                            <option value = "1" <?php if($selectGroupe == 1) echo "selected"; ?>>Groupe 1</option>
                            <option value = "2"  <?php if($selectGroupe == 2) echo "selected"; ?>>Groupe 2</option>
                        </select>
                    </li>
                    <li>
                        <label>Sélectionner le travail<span class="required">*</span></label>
                        <select name="selectTP" class="field-long">
                            <option value = "0">- Choisissez -</option>
                            <option value="1" <?php if($selectTP == 1) echo "selected"; ?>>Travail 1</option>
                            <option value="2" <?php if($selectTP == 2) echo "selected"; ?>>Travail 2</option>
                            <option value="3" <?php if($selectTP == 3) echo "selected"; ?>>Travail final</option>
                        </select>
                    </li>
                    <li>
                        <input type="submit" name="btnSubmit" value="Envoyer"  class="button-contact"/>
                    </li>
                </ul>
            </form>
        <?php
        require_once("fonctions-02.php");//Connecter à la page fonction-02 pour envoie d'informations de requête du user et traitement
        if(isset($_GET["btnSubmit"]))
        {
            if(!($_GET["selectGroupe"]) || !($_GET["selectTP"])) //Si le user n'a pas remplit ces champs du formulaire, envoyer le message
                echo "<h3 style=\"text-align: center\">Veuillez sélectionner le groupe ainsi que le travail dont vous désirez afficher les notes.</h3>";
            elseif(isset($_GET["selectGroupe"], $_GET["selectTP"]))
            {
                $groupe=$_GET["selectGroupe"];
                $tp = $_GET["selectTP"];
                $tableauNotes=notesParTP($_GET["selectGroupe"], $_GET["selectTP"]);  //Appel de la fonction
                echo $tableauNotes;
            }
        }
        
        ?>



</body>
</html>