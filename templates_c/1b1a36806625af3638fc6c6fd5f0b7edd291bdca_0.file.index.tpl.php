<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-17 19:55:29
  from 'C:\laragon\Serv_TP3\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602d74b13a2059_99394802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b1a36806625af3638fc6c6fd5f0b7edd291bdca' => 
    array (
      0 => 'C:\\laragon\\Serv_TP3\\templates\\index.tpl',
      1 => 1613591721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602d74b13a2059_99394802 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css">
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    </head>

    <body>

            <form>
            <div id="username" class="w3-container w3-pale-green">
                <h1>Exercice 1</h1>
                <label>Username</label>
                <input type="text" placeholder ="Username"/>
                <span>Merci d'entrer un username.</span>
                <p></p>
            </div>

            <div id="style" class="w3-container w3-pale-yellow">
                <h1>Exercice 2</h1>
                <label>Style :</label>
                <input type="text" placeholder ="Style"/>
            </div>

            <div id="communes" class="w3-container w3-pale-blue">
                <h1>Exercice 3</h1>
                <label>Code postal :</label>
                <input id="code" type="text" placeholder ="Code Postal"/>
                <label>Commune :</label>
                <input id="commune" type="text" placeholder ="Commune"/>
            </div>
        </form>
    </body>


    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

        // Fonction permettant de verifier si jQuery est lancé, et load les fonctions.
        $(function vérification() {
            console.info("jQuery chargé ")
            console.info($('#username input').blur(vUsername).keyup(vUsername))
            console.info($('#style input').blur(vStyle).keyup(vStyle))
            console.info($('#communes input').blur(vCommunes).keyup(vCommunes))
        })

        // EXERCICE 1
        // Fonction permettant de gérer la présence ou non d'un USERNAME dans la base de données.
        function vUsername()
        {
            // Si le champ est vide, alors afficher le span d'erreur
            if($('#username input').val().trim()===''){
                $('#username span').show()
                return false
            }else{
                // On récupère un objet JSON contenant les informations correspondantes à l'utilisateur saisi dans le champs.
                $.getJSON("../username/test/" + $('#username input').val().trim(), function(doexist) {
                 // On affiche l'objet dans la console.
                 console.log(doexist);
                
                // Affichage pour l'utilisateur si l'USERNAME est présent ou nom dans la base.
                for(var i in doexist){
                    if(doexist[i] == false){
                       $('#username p').text("L'utilisateur n'est pas dans la base.");
                    } else {
                       $('#username p').text("L'utilisateur est dans la base. Avec l'id " + doexist[i]);
                    }
                }   
                })
                // Si le champ n'est pas vide, alors effacer le span d'erreur.
                $('#username span').hide()
                }
        }

        // EXERCICE 2
        // Fonction permettant l'autocomplétion lorsque l'utilisateur recherche un style musical.
        function vStyle(){     

            // On récupère un objet JSON contenant la liste complète des styles musicaux.
            $.getJSON("../style", $('#style input').val().trim(), function(style) 
            {
                // On affiche l'objet dans la console.
                console.log(style);
                // On effectue l'autocomplétion dans l'input en comparant la saisie de l'utilisateur avec la liste des styles présente l'objet JSON (utilisée en source).
                $('#style input').autocomplete({
                source:style
                });
            })
        }

        // EXERCICE 3
        // Fonction permettant l'autocomplétion lorsque l'utilisateur saisit des caractères, en fonction d'un code postal saisi précédement.
        function vCommunes()
        {
            // Empeche l'execution du code / possibilité d'écrire dans commune si il n'y pas le code postal.
            if($('#communes input').val().trim()===''){
                $('#communes input#commune').prop("disabled", true);
                return false
            }else{

                // On récupère un objet JSON contenant la liste des communes en fonction du code postal saisi.
                $.getJSON("../communes/" + $('#communes input').val().trim(), function(communes) {
                 console.log(communes);
                     // Si le nombre de communes est nul, alors on désactive la possibilité d'écrire dans le champ correspondant.
                    if(communes.length == 0 ){
                        $('#communes input#commune').prop("disabled", true);
                    } else {
                        $('#communes input#commune').prop("disabled", false);
                    }

                    // Gestion de l'autocomplétion en fonction des communes trouvées.
                    $('#communes input#commune').autocomplete({
                        source:communes
                    });
                })

            }

    
        }
    <?php echo '</script'; ?>
>


</html><?php }
}
