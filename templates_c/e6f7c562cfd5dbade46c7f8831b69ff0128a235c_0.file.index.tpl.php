<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-17 10:25:51
  from 'C:\Users\Aurel509\Documents\IUT\TPWEB\Serv_TP3\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602cef2f295413_13826407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e6f7c562cfd5dbade46c7f8831b69ff0128a235c' => 
    array (
      0 => 'C:\\Users\\Aurel509\\Documents\\IUT\\TPWEB\\Serv_TP3\\templates\\index.tpl',
      1 => 1613557548,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602cef2f295413_13826407 (Smarty_Internal_Template $_smarty_tpl) {
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
    </body>


    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.5.1.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>

        $( function vérification() {
            console.info("jQuery chargé ")
            console.info($('#username input').blur(vUsername).keyup(vUsername))
    //        console.info($('#style input').blur(vStyle).keyup(vStyle))
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

    <?php echo '</script'; ?>
>


</html><?php }
}
