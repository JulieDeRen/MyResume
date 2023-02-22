<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche par étudiant</title>
    <link rel="stylesheet" href="css/stylesheet.css"><!--Style général du site-->

</head>
<body>
    <nav class="navigation-test">
        <button class="glow-on-hover" type="button"><a href="index.html" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Accueil</a></button>
        <button class="glow-on-hover" type="button"><a href="note-par-travail.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Notes par travail</a></button>
        <button class="glow-on-hover" type="button"><a href="note-finale.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Notes finales</a></button>
        <button class="glow-on-hover" type="button"><a href="recherche-par-etudiant.php" aria-haspopup="true" aria-labelledby="fileLabel"><span id="fileLabel"></span>Recherche par étudiant</a></button>
    </nav>

    <?php //déclaration de variable
        $etudiantRecherche = "";
        if(isset($_GET["matricule"]))
            $etudiantRecherche = $_GET["matricule"];

    ?>
    <h1>Recherche d'étudiant par numéro de matricule</h1>
    <form method="GET"> 
        <ul class="form-style-2">
            <li>
                <label for="matricule" class="field-long">Entrez le matricule<span class="required">*</span></label>
                    <input type="text" name="matricule" value="<?=$etudiantRecherche?>"/>
            </li>
            <li>
                <input type="submit" name="btnSubmit" value="Envoyer"  class="button-contact"/>
            </li>
        </ul>
    </form>
    <?php
    require_once("fonctions-02.php"); //Connecter à la page pour envoie d'info et retour du traitement de l'info par la fonction
    if(isset($_GET["btnSubmit"]))
    {
        if(!($_GET["matricule"]))
        echo "<h3 style=\"text-align: center\">Veuillez entrer un numéro de matricule.</h3>"; //message d'erreur si user n'a pas remplit le champs d'info requis
        elseif(isset($_GET["matricule"]))
        {
            $etudiantRecherche = $_GET["matricule"];
                $etudiant=etudiantRecherche($etudiantRecherche); //appel de la fonction
                echo $etudiant;
        }
    }
    
    ?>



</body>
</html>