<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fonctions PHP du TP Final en Programmation Web</title>
    <link rel="stylesheet" href="css/style.css"><!--Style général du site-->
    <style>/*style du tableau php semble ne pas fonctionner pas si mis seulement dans fichier stylesheet.css*/
        table{
            box-sizing: border-box;
            border-radius: 5px; 
            border:1px solid tomato;
            box-shadow: 1px 1px 3px black;
            padding: 10px; 
            text-align: center;
            margin: auto;
        }
        th, td{
            padding: 10px;
            border-bottom: 1px solid tomato;
            border-spacing: 0;
        }
    </style>
</head>
<body>
 
    <?php

    function notesParTP($groupe, $tp)
    {
        require_once("bd.php");//appel la bd pour les tableaux

            $chaine = "<table>"; // créer et remplir un tableau html
            $chaine .= "<thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>";
            if($tp == 1) 
            {
                $chaine .= "<th>Travail 1</th>"; //répétitions mais je ne sais pas comment les enlever
            }
            elseif($tp == 2)
            {
                $chaine .= "<th>Travail 2</th>";
            }
            elseif($tp == 3)
            {
                $chaine .= "<th>Travail final</th>";
            }
            $chaine .= "</tr>
                        </thead>";
            $chaine .= "<tbody>";
            if($groupe ==1)
                $groupeSelect = $NotesGroupe1;
            elseif($groupe == 2)
                $groupeSelect = $NotesGroupe2;

            foreach($groupeSelect as $matricule) 
            {
                $chaine .= "<tr>";

                $prenom = $matricule[0]; //$matricule est un tableau à index numérique ici
                $nom = $matricule[1];
                $sex = $matricule[2];
                $age = $matricule[3];
                $tp1=$matricule[4];
                $tp2=$matricule[5];
                $tp3= $matricule[6];

                if($tp == 1)
                {
                    $note = $tp1;
                    $sommeNote += $note; //répétition mais je ne sais pas comment les éliminer...
                }
                elseif($tp == 2)
                {
                    $note = $tp2;
                    $sommeNote += $note;
                }
                elseif($tp == 3)
                {
                    $note = $tp3;
                    $sommeNote += $note;
                }
                $chaine .= "<td>$prenom</td>";
                $chaine .= "<td>$nom</td>";
                $chaine .= "<td>$note%</td>";
                $chaine .= "</tr>";
                $moyenne = $sommeNote/count($groupeSelect);
                $moyenneFormatNumber = number_format($moyenne, 2, ',', ' ');
            }
            $chaine .= "<tr>
                            <td style = \"font-weight: bold\">Moyenne</td>
                            <td></td>
                            <td style = \"font-weight: bold\">$moyenneFormatNumber%</td>
                        </tr>";
            $chaine .= "</tbody>
                        </table>";
            return $chaine; //renvoie le tableau
        }
                    
//-------------------------------- NotesFinales-----------------------------------------------
        function notesFinales($groupeUser, $sexe, $echec) 
        {
            require_once("bd.php"); //appel des tableaux et déclaration de variables initiales

            if($groupeUser == 1) 
                $groupeChoix = $NotesGroupe1; //j'ai choisi de l'appeler $groupeChoix ici mais ça aurait pu être $groupeSelect comme fonction précédente
            elseif($groupeUser == 2)
                $groupeChoix = $NotesGroupe2;
            elseif($groupeUser == 3)
                $groupeChoix = array_merge($NotesGroupe1, $NotesGroupe2);

            $chaine = "<table>"; 
            $chaine .= "<thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Sexe</th>
                            <th>Note finale</th>";

            $chaine .= "</tr>
                        </thead>";
            $chaine .= "<tbody>";
            foreach($groupeChoix as $matricule) 
            {
                $prenom = $matricule[0]; //index numérique
                $nom = $matricule[1];
                $genre= $matricule[2];
                $tp1=$matricule[4];
                $tp2=$matricule[5];
                $tp3= $matricule[6];
                $note = $tp1 * 15 /100 + $tp2 * 35/100 + $tp3 * 50/100;
                if($matricule[2]=="F" && $sexe == 1)
                {
                    if ($note < 60 && $echec==1)
                    {
                        $j++;                                  //répétitions mais je ne comprends pas comment les enlever
                        $sommeNote += $note;
                        $moyenne = $sommeNote/$j;
                        $chaine .= "<tr>";
                        $chaine .= "<td>" . $prenom ."</td>";
                        $chaine .= "<td>" . $nom ."</td>";
                        $chaine .= "<td>" . $genre . "</td>";
                        $chaine .= "<td>$note%</td>";
                        $chaine .= "</tr>"; 
                    }
                    elseif($echec==0)
                    {
                        $j++;
                        $sommeNote += $note;
                        $moyenne = $sommeNote/$j;
                        $chaine .= "<tr>";
                        $chaine .= "<td>" . $prenom ."</td>";
                        $chaine .= "<td>" . $nom ."</td>";
                        $chaine .= "<td>" . $genre . "</td>";
                        $chaine .= "<td>$note%</td>";
                        $chaine .= "</tr>"; 
                    }
                }
                elseif($matricule[2]=="M" && $sexe ==2)
                {
                    if ($note < 60 && $echec==1)
                    {
                        $j++;
                        $sommeNote += $note;
                        $moyenne = $sommeNote/$j;
                        $chaine .= "<tr>";
                        $chaine .= "<td>" . $prenom ."</td>";
                        $chaine .= "<td>" . $nom ."</td>";
                        $chaine .= "<td>" . $genre . "</td>";
                        $chaine .= "<td>$note%</td>";
                        $chaine .= "</tr>"; 
                    }
                    elseif($echec==0)
                    {
                        $j++;
                        $sommeNote += $note;
                        $moyenne = $sommeNote/$j;
                        $chaine .= "<tr>";
                        $chaine .= "<td>" . $prenom ."</td>";
                        $chaine .= "<td>" . $nom ."</td>";
                        $chaine .= "<td>" . $genre . "</td>";
                        $chaine .= "<td>$note%</td>";
                        $chaine .= "</tr>"; 
                    }
                }
                elseif($sexe ==3)
                {
                    if ($note < 60 && $echec==1)
                    {
                        $j++;
                        $sommeNote += $note;
                        $moyenne = $sommeNote/$j;
                        $chaine .= "<tr>";
                        $chaine .= "<td>" . $prenom ."</td>";
                        $chaine .= "<td>" . $nom ."</td>";
                        $chaine .= "<td>" . $genre . "</td>";
                        $chaine .= "<td>$note%</td>";
                        $chaine .= "</tr>"; 
                    }
                    elseif($echec==0)
                    {
                        $j++;
                        $sommeNote += $note;
                        $moyenne = $sommeNote/$j;
                        $chaine .= "<tr>";
                        $chaine .= "<td>" . $prenom ."</td>";
                        $chaine .= "<td>" . $nom ."</td>";
                        $chaine .= "<td>" . $genre . "</td>";
                        $chaine .= "<td>$note%</td>";
                        $chaine .= "</tr>"; 
                    }
                }       
            }
            $moyenneFormatNumber = number_format($moyenne, 2, ',', ' '); // 2 décimales pour l'affichage de la moyenne
            $chaine .= "<tr>
                        <td>Moyenne</td>
                        <td></td>
                        <td></td>";
            if($moyenneFormatNumber==0)
            {
                $chaine .= "<td></td>";
            }
            else
            {
                $chaine .= "<td> $moyenneFormatNumber%</td>";
            }
            $chaine .= "</tr>";
            $chaine .= "</tbody>
                        </table>";
            foreach ($groupeChoix as $matricule => $value) 
            {
                unset($groupeChoix[$matricule]); //effacer toutes les données du tableau $groupeChoix pour réinitialiser le tableau
            }
            return $chaine;
        
        }



  //--------------------------------------------------------------------------------------------

        function etudiantRecherche($etudiantRecherche)
        {
            require_once("bd.php"); //appel des tableaux de données
            $matriculeFormat = '/^[a-zA-Z][a-zA-Z][a-zA-Z][a-zA-Z]\d\d\d\d\d\d$/i'; //format du matricule Regex
            $verifFormatMatricule = preg_match($matriculeFormat, $etudiantRecherche);  //fonction renvoie 1 ou 0 dépendemment si le format entré match le format de matricule

            if($verifFormatMatricule === 0)
            {
                $message = "<h3 style=\"text-align: center\">Ce format de matricule est invalide.  Veuillez entrer un matricule de 4 lettres, suivit de 6 chiffres.</h3>";
                return $message; //message d'erreur si format match pas
            }

            elseif($verifFormatMatricule === 1)
            {
                $groupeSelect=array_merge($NotesGroupe1, $NotesGroupe2); //regarder dans l'ensemble des groupes d'étudiants
                $chaine = "<table>"; 
                $chaine .= "<thead>
                            <tr>
                                <th>Prénom</th>
                                <th>Nom</th>
                                <th>Travail 1</th>
                                <th>Travail 2</th>
                                <th>Travail final</th>
                                <th>Note final</th>";

                $chaine .= "</tr>
                            </thead>";
                $chaine .= "<tbody>";
                foreach($groupeSelect as $matricule => $value) 
                {
                    if($etudiantRecherche == $matricule)
                    {
                        $prenom = $value[0];
                        $nom = $value[1];
                        $sex = $value[2];
                        $age = $value[3];
                        $tp1=$value[4];
                        $tp2=$value[5];
                        $tp3= $value[6];
                        $note = $tp1*15/100+$tp2*35/100+$tp3*50/100;
                        $chaine .= "<tr>
                                        <td>$prenom</td>
                                        <td>$nom</td>
                                        <td>$tp1%</td>
                                        <td>$tp2%</td>
                                        <td>$tp3%</td>
                                        <td>$note%</td>
                                    </tr>";
                        $chaine .= "</tbody>
                                    </table>";
                        return $chaine;
                    }
                }

                if($etudiantRecherche !== $matricule)
                    {
                        $chaine = "<h3 style=\"text-align: center\">Ce numéro de matricule ne correspond à aucun étudiant.<br>Veuillez vérifier le numéro et réessayer de nouveau.</h3>";
                        return $chaine; 
                    }

            
            }
        }