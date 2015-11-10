<?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:05:57
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\filter\facet-value-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3210356424015ba6b38-87898015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb0fb79db0e7a1185a23473dcb5e880d6eb58c96' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\filter\\facet-value-list.tpl',
      1 => 1445516552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3210356424015ba6b38-87898015',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'facet' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_56424015bfca43_22032467',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56424015bfca43_22032467')) {function content_56424015bfca43_22032467($_smarty_tpl) {?>


	<div class="filter-panel filter--property facet--<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['facet']->value->getFacetName(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
"
		 data-filter-type="value-list"
		 data-field-name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['facet']->value->getFieldName(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
">

		
			<div class="filter-panel--flyout">

				
					<label class="filter-panel--title">
						<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facet']->value->getLabel(), ENT_QUOTES, 'utf-8', true);?>

					</label>
				

				
					<span class="filter-panel--icon"></span>
				

				
					<div class="filter-panel--content">

						
							<ul class="filter-panel--option-list">

								<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['facet']->value->getValues(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>

									
										<li class="filter-panel--option">

                                            
                                                <div class="option--container">

                                                    
                                                        <span class="filter-panel--checkbox">
                                                            <input type="checkbox"
                                                                   id="__<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['facet']->value->getFieldName(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
__<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value->getId(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
"
                                                                   name="__<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['facet']->value->getFieldName(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
__<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value->getId(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
"
                                                                   value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value->getId(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
"
                                                                   <?php if ($_smarty_tpl->tpl_vars['option']->value->isActive()){?>checked="checked" <?php }?>/>

                                                            <span class="checkbox--state">&nbsp;</span>
                                                        </span>
                                                    

                                                    
                                                        <label class="filter-panel--label"
                                                               for="__<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['facet']->value->getFieldName(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
__<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value->getId(), ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
">
                                                            <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value->getLabel(), ENT_QUOTES, 'utf-8', true);?>

                                                        </label>
                                                    
                                                </div>
                                            
										</li>
									
								<?php } ?>
							</ul>
						
					</div>
				
			</div>
		
	</div>

<?php }} ?>