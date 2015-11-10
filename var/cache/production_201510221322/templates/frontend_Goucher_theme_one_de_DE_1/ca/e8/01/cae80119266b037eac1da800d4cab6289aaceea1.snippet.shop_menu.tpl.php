<?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:05:50
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\widgets\index\shop_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:280675642400ea80277-10885552%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cae80119266b037eac1da800d4cab6289aaceea1' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\widgets\\index\\shop_menu.tpl',
      1 => 1445516552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280675642400ea80277-10885552',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop' => 0,
    'languages' => 0,
    'language' => 0,
    'currencies' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5642400eaca600_50724444',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5642400eaca600_50724444')) {function content_5642400eaca600_50724444($_smarty_tpl) {?>

    <?php if ($_smarty_tpl->tpl_vars['shop']->value&&count($_smarty_tpl->tpl_vars['languages']->value)>1){?>
        <div class="top-bar--language navigation--entry">
            <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1){?>
                <form method="post" action="" class="language--form">
                    <div class="field--select">
                        <?php if ($_smarty_tpl->tpl_vars['shop']->value&&count($_smarty_tpl->tpl_vars['languages']->value)>1){?>
                            <div class="language--flag <?php echo $_smarty_tpl->tpl_vars['shop']->value->getLocale()->toString();?>
"><?php echo $_smarty_tpl->tpl_vars['shop']->value->getName();?>
</div>
                        <?php }?>
                        <select name="__shop" class="language--select" data-auto-submit="true">
                            <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['language']->value->getId();?>
" <?php if ($_smarty_tpl->tpl_vars['language']->value->getId()===$_smarty_tpl->tpl_vars['shop']->value->getId()){?>selected="selected"<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['language']->value->getName();?>

                                </option>
                            <?php } ?>
                        </select>
                        <input type="hidden" name="__redirect" value="1">
                        
                        <span class="arrow"></span>
                    </div>
                </form>
            <?php }?>
        </div>
    <?php }?>




    <?php if (count($_smarty_tpl->tpl_vars['currencies']->value)>1){?>
        <div class="top-bar--currency navigation--entry">
			<form action="" method="post" class="currency--form">
                <div class="field--select">
                    <select name="__currency" class="currency--select" data-auto-submit="true">
                        <?php  $_smarty_tpl->tpl_vars['currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['currency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->key => $_smarty_tpl->tpl_vars['currency']->value){
$_smarty_tpl->tpl_vars['currency']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['currency']->value->getId();?>
"<?php if ($_smarty_tpl->tpl_vars['currency']->value->getId()===$_smarty_tpl->tpl_vars['shop']->value->getCurrency()->getId()){?> selected="selected"<?php }?>>
                                <?php echo $_smarty_tpl->tpl_vars['currency']->value->getSymbol();?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->getCurrency();?>

                            </option>
                        <?php } ?>
                    </select>
                    <span class="arrow"></span>
                </div>
			</form>
        </div>
    <?php }?>
<?php }} ?>