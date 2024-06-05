<?php

require_once "PersOOOn.php";

$perso1 = "Pas encore de personnage";

// si on a cliqué sur envoyer
if(isset($_POST['especePerso'])){
    try{
        $perso1 = new PersOOOn(name: $_POST['nomPerso'], species2: $_POST['especePerso']);
    }catch(Exception $e){
        echo $e->getCode()." ".$e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix d'un PersOOOn</title>
</head>
<body>
    <h1>Choix d'un PersOOOn</h1>
    <form action="" method="POST" name="perso">
        <label>Utilisez un nom de minimum 3 caractères et maximum de 16 caractéres</label> 
        <input type="text" name="nomPerso" placeholder="Nom du personnage" />
        <select name="especePerso">
            <option value="nimporte">nimporte</option>
            <?php

                // on peut facilement lire une constante public depuis la classe
                // sans devoir l'instancier avec sont nom, puis ::, puis le nom de la
                // constante
                foreach(PersOOOn::ESPECE_PERSO as $item):
            ?>
            <option value="<?=$item?>"><?=$item?></option>
            <?php
                endforeach;
            ?>

        </select>
        <input type="submit" value="Créer le personnage" />
    </form>
    <?php

    var_dump($_POST,$perso1);

?>
</body>
</html>
