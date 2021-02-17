<?php

// EXERCICE 1 - Partie PHP

/*
    Afin de tester la route :

        localhost/username/test/Adrield     ->      fonctionne, artiste présent dans la BDD, retourne 
                                                        {"L'user Adrield est present dans la BDD ":true," son idUser est ":"4915"}

        localhost/username/test/maxfly      ->      ne fonctionne pas, artiste pas présent dans la BDD, retourne 
                                                        {"L'user maxfly est present dans la BDD ":false}
*/

// Route permettant de verifier si un nom est bien présent dans la base de données.
Flight::route('GET /username/test/@name', function($name){     
    
    // On fait une requete pour verifier si le nom demandé dans l'URL existe dans la base.
    $db = Flight::get('db');
    $existe = FALSE;
    $requete = $db->prepare('SELECT idUser FROM User WHERE NomUser = ?');
    $requete->execute(array($name));

    // $donnees récupère la ligne correspondant au nom demandé dans l'URL si celui ci est dans la BDD.
    // Si le nom n'est pas présent dans la BDD, alors $donnees récupère NULL                !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! PAS SUR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    while ($donnees = $requete->fetch())
    {
        // La variable idUser prend la valeur correspondant à l'id dans le tableau $donnees
        $idUser = $donnees['idUser'];
        
        // Si la variable $idUser n'est pas NULL, alors le booléen $existe est positif. 
        if(isset($idUser)) {
            $existe = true;
        }
    }

    // Si $existe est positif, alors on affiche un objet json personnalisé en donnant la variable $name (le nom dans l'URL), ainsi que l'id associé dans la base de données.
    // Si $existe est négatif, alors on affiche un objet json personnalisé indiquant le nom n'est pas présent dans la base de données.
    if($existe) {
        Flight::json(array("L'user $name est present dans la BDD " => true, ' son idUser est ' => $idUser));
    } else {
        Flight::json(array("L'user $name est present dans la BDD " => false));
    }
});


// EXERCICE 2 - Partie PHP

Flight::route('GET /style', function(){     

    $db = Flight::get('db');
    $verif = Flight::request()->query['NameStyle']."%";
    $requete_2 = $db->prepare('SELECT NomStyle FROM Style WHERE NomStyle LIKE ?');
    $requete_2->execute(array($verif));
    $donnees = $requete_2 ->fetchAll(PDO::FETCH_COLUMN, 'NameStyle');

    Flight::json($donnees);

});


Flight::route('GET /communes/@code', function($code){
    $db = Flight::get('db');
    $requete = $db->prepare("SELECT NomCommune FROM Commune WHERE CodePostal=:CodePostal");
    $requete -> execute(array(':CodePostal' => "$code"));
    $NomCommunes = $requete -> fetchAll();
  
    if(empty($NomCommunes)){
        Flight::json(array());
    }
    else {

        $tab=array();

        foreach($NomCommunes as $Commune){
            $tab[]=$Commune[0];
        }

        Flight::json($tab);
    
    }
});

Flight::route('GET /', function(){
    Flight::render("templates/index.tpl", array("title"=>"Home"));

});

