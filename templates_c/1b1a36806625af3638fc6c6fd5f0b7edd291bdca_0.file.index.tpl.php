<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-17 09:53:13
  from 'C:\laragon\Serv_TP3\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602ce789eb98e8_43785492',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b1a36806625af3638fc6c6fd5f0b7edd291bdca' => 
    array (
      0 => 'C:\\laragon\\Serv_TP3\\templates\\index.tpl',
      1 => 1613555592,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602ce789eb98e8_43785492 (Smarty_Internal_Template $_smarty_tpl) {
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
                //$('#username').addClass("erreur")
                return false
            }else{
                $.getJSON("../username/test/" + $('#username input').val().trim(), function(doexist) {
                 console.log(doexist);   
                })
                $('#username span').hide()
                //$('#username').removeClass("erreur")

            }
            
    
        }

    <?php echo '</script'; ?>
>


</html><?php }
}
