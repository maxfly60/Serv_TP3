<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-16 22:55:34
  from 'C:\laragon\Serv_TP3\templates\style.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_602c4d663af232_49811802',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3718322821f30fe9ac306405f45191f26405405' => 
    array (
      0 => 'C:\\laragon\\Serv_TP3\\templates\\style.tpl',
      1 => 1613516132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_602c4d663af232_49811802 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/vader/jquery-ui.css">
        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    </head>

    <body>
        <header>

        </header>

        <main>
        <h1> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
 </h1>
            <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-1.12.4.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"><?php echo '</script'; ?>
>
            <?php echo '<script'; ?>
>
            $( function() {
        $( "#tags" ).autocomplete({
        source: <?php echo $_smarty_tpl->tpl_vars['music']->value;?>

            });
        } );
        <?php echo '</script'; ?>
>

 
<div class="ui-widget">
  <label for="tags">Tags: </label>
  <input id="tags">
</div>
        </main>

        <footer>


        </footer>
    </body>
</html><?php }
}
