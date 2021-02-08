<?php

require "includes/flight/flight/Flight.php";
require 'includes/smarty/libs/Smarty.class.php'; 

$db = new PDO(
    "sqlite:data.db"
);

Flight::set('db', $db);

Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = './templates/';
    $smarty->compile_dir = './templates_c/';
    $smarty->config_dir = './config/';
    $smarty->cache_dir = './cache/';
   });
    Flight::map('render', function($template, $data){
    Flight::view()->assign($data);
    Flight::view()->display($template);
   }); 


session_start();
include("fonctions.php");
Flight::start();
?>