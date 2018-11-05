<?php
/* Smarty version 3.1.33, created on 2018-11-05 14:53:48
  from '/www/wwwroot/yafdemo_com/application/views/error/error.phtml' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5bdfe8fca09014_82301081',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef6dd275bdcda38be94d56d1531337ceb10442a7' => 
    array (
      0 => '/www/wwwroot/yafdemo_com/application/views/error/error.phtml',
      1 => 1541386404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5bdfe8fca09014_82301081 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>echo "Error Msg:"  . $exception->getMessage();
<?php echo '?>';
}
}
