<?php

// EXERCICE 1

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
    // Si le nom n'est pas présent dans la BDD, alors $donnees récupère false.
    while ($donnees = $requete->fetch())
    {
        // La variable idUser prend la valeur correspondant à l'id dans le tableau $donnees
        $idUser = $donnees['idUser'];
        
        // Si la variable $idUser n'est pas false, alors le booléen $existe est positif. 
        if(isset($idUser)) {
            $existe = true;
        }
    }

    // Si $existe est positif, alors on affiche un objet JSON personnalisé en donnant la variable $name (le nom dans l'URL), ainsi que l'id associé dans la base de données.
    // Si $existe est négatif, alors on affiche un objet JSON personnalisé indiquant le nom n'est pas présent dans la base de données.
    if($existe) {
        Flight::json(array("L'user $name est present dans la BDD " => true, ' son idUser est ' => $idUser));
    } else {
        Flight::json(array("L'user $name est present dans la BDD " => false));
    }
});


// EXERCICE 2

/*
    Afin de tester la route :

        localhost/username/style     ->      renvoie la liste des styles musicaux.
*/

// Route permettant de retourner la liste des styles musicaux dans la base de données.
Flight::route('GET /style', function(){     

    // On fait une requete pour retourner la liste des styles musicaux. 
    $db = Flight::get('db');
    $verif = Flight::request()->query['style']."%";
    $requete = $db->prepare('SELECT NomStyle FROM Style WHERE NomStyle LIKE ?');
    $requete->execute(array($verif));
    $data = $requete ->fetchAll(PDO::FETCH_COLUMN, 'style');

    // Affichage d'un objet JSON contenant la liste des styles musicaux.
    Flight::json($data);

});


// EXERCICE 3

/*
    Afin de tester la route :

        localhost/communes/60600     ->      renvoie la liste des communes ayant comme code postal 60600.
                                                    ["Agnetz","Airion","Breuil-le-Vert", ........ ,"Saint-Aubin-sous-Erquery"]
        localhost/communes/60601     ->      renvoie un tableau vide.
                                                    []
*/


// Route permettant de retourner la liste des communes selon un code postal.
Flight::route('GET /communes/@code', function($code){

    // On fait une requete pour verifier si le code postal demandé dans l'URL existe dans la base.
    $db = Flight::get('db');
    $requete = $db->prepare("SELECT NomCommune FROM Commune WHERE CodePostal = :code");
    $requete -> execute(array(':code' => "$code"));
    $communes = $requete -> fetchAll();
  
    // Si la liste de commune est vide, alors on affiche un objet JSON contenant un vide.
    if(empty($communes)){
        Flight::json(array());
    } 
    // Sinon, les communes récupérées sont placées dans un tableau.
    else {

        $tableau=array();

        foreach($communes as $commune){
            $tableau[]=$commune[0];
        }
        // Et on affiche un objet JSON contenant le dit tableau.
        Flight::json($tableau);
    
    }
});


Flight::route('GET /', function(){
    Flight::render("templates/index.tpl", array("title"=>"Home"));

});

