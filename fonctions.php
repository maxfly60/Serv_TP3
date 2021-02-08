<?php

Flight::route('GET /username/test/@name', function($name){
    $db = Flight::get('db');
    $exists = FALSE;
    $requete = $db->prepare('SELECT idUser FROM User WHERE NomUser = ?');
    $requete->execute(array($name));
    while ($donnees = $requete->fetch())
    {
        $idUser = $donnees['idUser'];
        if(isset($idUser)) {
            $exists = true;
        }
    }
    if($exists) {
        echo $name;
        Flight::json(array('exists' => true, 'idUser' => $idUser));
    } else {
        Flight::json(array('exists' => false));
    }
});


Flight::route('GET /', function(){
    Flight::render("templates/index.tpl", array("title"=>"Home"));

});

Flight::route('GET /styles', function(){
    Flight::render("templates/styles.tpl", array("title"=>"styles"));

});