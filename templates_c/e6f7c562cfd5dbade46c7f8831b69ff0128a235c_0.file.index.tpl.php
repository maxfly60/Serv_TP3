<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-17 18:00:36
  from 'C:\Users\Aurel509\Documents\IUT\TPWEB\Serv_TP3\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602d59c40a2e97_68959359',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6f7c562cfd5dbade46c7f8831b69ff0128a235c' => 
    array (
      0 => 'C:\\Users\\Aurel509\\Documents\\IUT\\TPWEB\\Serv_TP3\\templates\\index.tpl',
      1 => 1613584579,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602d59c40a2e97_68959359 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css">
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    </head>

    <body>
        <h1>Exercice 1</h1>
        <div id="username">
            <label>Username</label>
            <input type="text" placeholder ="Username"/>
            <span>Merci d'entrer un username.</span>
            <p></p>
        </div>
        <h1>Exercice 2</h1>
        <div id="style">
            <label>Style :</label>
            <input type="text" placeholder ="Style"/>
        </div>
        <h1>Exercice 3</h1>
        <div id="communes">
            <label>Code postal :</label>
            <input id="code" type="text" placeholder ="Code Postal"/>
            <label>Commune :</label>
            <input id="commune" type="text" placeholder ="Commune"/>
            <p></p>
        </div>
    </body>


    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
>

        $(function vérification() {
            console.info("jQuery chargé ")
            console.info($('#username input').blur(vUsername).keyup(vUsername))
            console.info($('#style input').blur(vStyle).keyup(vStyle))
            console.info($('#communes input').blur(vCommunes).keyup(vCommunes))
        })

        function vUsername()
        {
            if($('#username input').val().trim()===''){
                $('#username span').show()
                return false
            }else{
                $.getJSON("../username/test/" + $('#username input').val().trim(), function(doexist) {
                 console.log(doexist);
                 for(var i in doexist){
                     if(doexist[i] == false){
                        $('#username p').text("L'utilisateur n'est pas dans la base.");
                     } else {
                        $('#username p').text("L'utilisateur est dans la base. Avec l'id " + doexist[i]);
                     }
                 }   

                })
                $('#username span').hide()

            }
            
    
        }

        function vStyle(){     

            if($('#style input').val().trim()===''){
                $('#style span').show()
                return false
            } else {
                $.getJSON("../style", $('#style input').val().trim(), function(style) 
                {
                    console.log(style);

                    $('#style input').autocomplete({
                    source:style
                    });
                })
                $('#style span').hide()

            }
            
    
        }
        //MARCHE QU'A 95% 
        /*
        */
        function vCommunes()
        {
            if($('#communes input').val().trim()===''){
                $('#communes span').show()
                return false
            }else{
                $.getJSON("../communes/" + $('#communes input').val().trim(), function(communes) {
                 console.log(communes);
                    if(communes.length == 0){
                        $('#communes input#commune').prop("disabled", true);
                    } else {
                        $('#communes input#commune').prop("disabled", false);
                    }


                    $('#communes input#commune').autocomplete({
                        source:communes
                    });
                })

                $('#communes span').hide()

            }

    
        }

    <?php echo '</script'; ?>
>


</html><?php }
}
