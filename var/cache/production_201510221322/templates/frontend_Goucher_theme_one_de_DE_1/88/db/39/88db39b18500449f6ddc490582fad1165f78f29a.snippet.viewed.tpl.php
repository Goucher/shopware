<?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\widgets\recommendation\viewed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:186065642402b7a8377-82486028%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88db39b18500449f6ddc490582fad1165f78f29a' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\widgets\\recommendation\\viewed.tpl',
      1 => 1445516552,
      2 => 'file',
    ),
    '638a13c033c12769c0c7ddf9ea71e626bda912e5' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\box-basic.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    'd73cfa5a3bf83f11cf813765f37e1d929b983104' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\product-badges.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    '212455c1807bdf33230253ff3348ca911f92ecd7' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\product-image.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    '35a0d6da5a30c757ae14d899e2626f32dc32f880' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\_includes\\rating.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    '68c5397874f55a6f1faab1ce083b79f2930c5d92' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\product-price-unit.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    '59d385db84052c4bc47e0c467ce5cccacf36d882' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\product-price.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    '6d65a79a94fb08cb7640050f663971cc70aab81d' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\product-actions.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    '36266103c6448c312e81e6456aa6c4170a4df9f5' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\box-minimal.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    '244f26f9225bbe6f7e6a26bcf682e8e3b6007e55' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\box-big-image.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    'a51b639807e0c9af0654bb2b2af89610cec4ad8b' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\box-product-slider.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    'aef4218202c727c04d978a9b08b07656e195fdc4' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\product-box\\box-emotion.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
    'df6ffcd7827ac64062afa05e4a07ac6e2845e4e0' => 
    array (
      0 => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\themes\\Frontend\\Bare\\frontend\\listing\\box_article.tpl',
      1 => 1445516552,
      2 => 'snippet',
    ),
  ),
  'nocache_hash' => '186065642402b7a8377-82486028',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'viewedArticles' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5642402c40a9a3_71446128',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5642402c40a9a3_71446128')) {function content_5642402c40a9a3_71446128($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['viewedArticles']->value){?>
    
        <div class="viewed--content">
            <div class="product-slider" data-product-slider="true">
                
                    <div class="product-slider--container">
                        <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['viewedArticles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
                            <div class="product-slider--item">
                                <?php /*  Call merged included template "frontend/listing/box_article.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/box_article.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('sArticle'=>$_smarty_tpl->tpl_vars['article']->value,'productBoxLayout'=>"slider"), 0, '186065642402b7a8377-82486028');
content_5642402b7b7d73_38514612($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/box_article.tpl" */?>
                            </div>
                        <?php } ?>
                    </div>
                
            </div>
        </div>
    
<?php }?><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\box_article.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b7b7d73_38514612')) {function content_5642402b7b7d73_38514612($_smarty_tpl) {?>

    <?php if ($_smarty_tpl->tpl_vars['productBoxLayout']->value=='minimal'){?>
        <?php /*  Call merged included template "frontend/listing/product-box/box-minimal.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/box-minimal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402b7bfa77_42846096($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/box-minimal.tpl" */?>

    <?php }elseif($_smarty_tpl->tpl_vars['productBoxLayout']->value=='image'){?>
        <?php /*  Call merged included template "frontend/listing/product-box/box-big-image.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/box-big-image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402b9e6778_40749390($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/box-big-image.tpl" */?>

    <?php }elseif($_smarty_tpl->tpl_vars['productBoxLayout']->value=='slider'){?>
        <?php /*  Call merged included template "frontend/listing/product-box/box-product-slider.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/box-product-slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bc1ce73_19708196($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/box-product-slider.tpl" */?>

    <?php }elseif($_smarty_tpl->tpl_vars['productBoxLayout']->value=='emotion'){?>
        <?php /*  Call merged included template "frontend/listing/product-box/box-emotion.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/box-emotion.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402be091e2_01498534($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/box-emotion.tpl" */?>

    <?php }else{ ?>
        
            <?php /*  Call merged included template "frontend/listing/product-box/box-basic.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/box-basic.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('productBoxLayout'=>"basic"), 0, '186065642402b7a8377-82486028');
content_5642402c21e638_36678477($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/box-basic.tpl" */?>
        
    <?php }?>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\box-minimal.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b7bfa77_42846096')) {function content_5642402b7bfa77_42846096($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>


    <div class="product--box box--<?php echo $_smarty_tpl->tpl_vars['productBoxLayout']->value;?>
"
         data-page-index="<?php echo $_smarty_tpl->tpl_vars['pageIndex']->value;?>
"
         data-ordernumber="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'];?>
"
         <?php ob_start();?><?php echo 0;?><?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?> data-category-id="<?php echo $_smarty_tpl->tpl_vars['sCategoryCurrent']->value;?>
"<?php }?>>

        
            <div class="box--content is--rounded">

                
                
                    <?php /*  Call merged included template "frontend/listing/product-box/product-badges.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-badges.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402b7eaa05_63870774($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-badges.tpl" */?>
                

                
                    <div class="product--info">

                        
                        
                            <?php /*  Call merged included template "frontend/listing/product-box/product-image.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402b819801_70249955($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-image.tpl" */?>
                        

                        
                        
                            <div class="product--rating-container">
                                <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['sVoteAverage']['average']){?>
                                    <?php /*  Call merged included template "frontend/_includes/rating.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('frontend/_includes/rating.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('points'=>$_smarty_tpl->tpl_vars['sArticle']->value['sVoteAverage']['average'],'type'=>"aggregated",'label'=>false,'microData'=>false), 0, '186065642402b7a8377-82486028');
content_5642402b863b95_94128279($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/_includes/rating.tpl" */?>
                                <?php }?>
                            </div>
                        

                        
                        
                            <a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
                               class="product--title"
                               title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
">
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sArticle']->value['articleName'],50);?>

                            </a>
                        

                        
                        

                        
                            <div class="product--price-info">

                                
                                
                                    <?php /*  Call merged included template "frontend/listing/product-box/product-price-unit.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price-unit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402b91b546_64938439($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price-unit.tpl" */?>
                                

                                
                                
    <div class="product--price-outer">
        <div class="product--price">

            
            
                <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
                    <span class="price--discount is--nowrap">
                        <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['pseudoprice']);?>

                        <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                    </span>
                <?php }?>
            

            
            
                <span class="price--default is--nowrap<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?> is--discount<?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['priceStartingFrom']&&!$_smarty_tpl->tpl_vars['sArticle']->value['liveshoppingData']){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ab<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php }?>
                    <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['price']);?>

                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </span>
            
        </div>
    </div>

                            </div>
                        

                        
                        
                    </div>
                
            </div>
        
    </div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-badges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b7eaa05_63870774')) {function content_5642402b7eaa05_63870774($_smarty_tpl) {?>



	<div class="product--badges">

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
				<div class="product--badge badge--discount">
                    <i class="icon--percent2"></i>
                </div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['highlight']){?>
                <div class="product--badge badge--recommend">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
TIPP!<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            <?php }?>
        

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['newArticle']){?>
				<div class="product--badge badge--newcomer">
					<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
NEU<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['esd']){?>
                <div class="product--badge badge--esd">
                    <i class="icon--download"></i>
                </div>
            <?php }?>
        
	</div>







<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-image.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b819801_70249955')) {function content_5642402b819801_70249955($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
   title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
"
   class="product--image">
    
        <span class="image--element">
            
                <span class="image--media">

                    <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true), null, 0);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'])){?>

                        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['description']){?>
                            <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['image']['description'], ENT_QUOTES, 'utf-8', true), null, 0);?>
                        <?php }?>

                        
                            <img srcset="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'][0]['sourceSet'];?>
"
                                 alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                                 title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                        
                    <?php }else{ ?>
                        <img src="/shopware/themes/Frontend/Responsive/frontend/_public/src/img/no-picture.jpg"
                             alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                             title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                    <?php }?>
                </span>
            
        </span>
    
</a><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\_includes\rating.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b863b95_94128279')) {function content_5642402b863b95_94128279($_smarty_tpl) {?>

    <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable('single', null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['type']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable($_smarty_tpl->tpl_vars['type']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable(10, null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['base']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable($_smarty_tpl->tpl_vars['base']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(true, null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['microData']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable($_smarty_tpl->tpl_vars['microData']->value, null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value&&$_smarty_tpl->tpl_vars['isType']->value==='aggregated'&&$_smarty_tpl->tpl_vars['count']->value===0){?> 
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='single'){?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"', null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"', null, 0);?>
    <?php }?>




    <?php if (isset($_smarty_tpl->tpl_vars['label']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['label']->value, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(true, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <span class="product--rating"<?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?> <?php echo $_smarty_tpl->tpl_vars['data']->value;?>
<?php }?>>

        
        
            <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value/2, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['isBase']->value==5){?>
                <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value, null, 0);?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?>
                <meta itemprop="ratingValue" content="<?php echo $_smarty_tpl->tpl_vars['points']->value;?>
">
                <meta itemprop="worstRating" content="1">
                <meta itemprop="bestRating" content="<?php echo $_smarty_tpl->tpl_vars['isBase']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
                    <meta itemprop="ratingCount" content="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                <?php }?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['points']->value!=0){?>
                <?php $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int)ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0){
for ($_smarty_tpl->tpl_vars['value']->value = 1, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++){
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration == 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration == $_smarty_tpl->tpl_vars['value']->total;?>
                    <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star', null, 0);?>

                    <?php if ($_smarty_tpl->tpl_vars['value']->value>$_smarty_tpl->tpl_vars['average']->value){?>
                        <?php $_smarty_tpl->tpl_vars['diff'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value-$_smarty_tpl->tpl_vars['average']->value, null, 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['diff']->value>0&&$_smarty_tpl->tpl_vars['diff']->value<=0.5){?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-half', null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-empty', null, 0);?>
                        <?php }?>
                    <?php }?>

                    <i class="<?php echo $_smarty_tpl->tpl_vars['cls']->value;?>
"></i>
                <?php }} ?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasLabel']->value&&$_smarty_tpl->tpl_vars['count']->value){?>
                <span class="rating--count-wrapper">
                    (<span class="rating--count"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</span>)
                </span>
            <?php }?>
        
    </span>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price-unit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b91b546_64938439')) {function content_5642402b91b546_64938439($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="price--unit">

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=0){?>

        
        
            <span class="price--label label--purchase-unit is--bold is--nowrap">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Inhalt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        

        
        
            <span class="is--nowrap">
                <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>

            </span>
        
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=$_smarty_tpl->tpl_vars['sArticle']->value['referenceunit']){?>

        
        
            <span class="is--nowrap">
                (<?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['referenceprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 / <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['referenceunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>
)
            </span>
        
    <?php }?>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b952059_46873589')) {function content_5642402b952059_46873589($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="product--price">

    
    
        <span class="price--default is--nowrap<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?> is--discount<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['priceStartingFrom']&&!$_smarty_tpl->tpl_vars['sArticle']->value['liveshoppingData']){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ab<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php }?>
            <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['price']);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </span>
    

    
    
        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
            <span class="price--discount is--nowrap">
                <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['pseudoprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        <?php }?>
    
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b9a40e6_13951219')) {function content_5642402b9a40e6_13951219($_smarty_tpl) {?>

<div class="product--actions">

    
    
        <?php ob_start();?><?php echo 1;?><?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
            <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'compare', 'action' => 'add_article', 'articleID' => $_smarty_tpl->tpl_vars['sArticle']->value['articleID'], ))); ?>"
               title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
               class="product--action action--compare"
               data-product-compare-add="true"
               rel="nofollow">
                <i class="icon--compare"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </a>
        <?php }?>
    

    
    
        <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'add', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           title="<?php ob_start();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo "Auf den Merkzettel";?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_tmp2=ob_get_clean();?><?php echo htmlspecialchars($_tmp2, ENT_QUOTES, 'utf-8', true);?>
"
           class="product--action action--note"
           data-ajaxUrl="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'ajaxAdd', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           data-text="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Gemerkt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
           rel="nofollow">
            <i class="icon--heart"></i> <span class="action--text"><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Merken<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        </a>
    

    
    

    
    
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\box-big-image.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402b9e6778_40749390')) {function content_5642402b9e6778_40749390($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>


    <div class="product--box box--<?php echo $_smarty_tpl->tpl_vars['productBoxLayout']->value;?>
"
         data-page-index="<?php echo $_smarty_tpl->tpl_vars['pageIndex']->value;?>
"
         data-ordernumber="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'];?>
"
         <?php ob_start();?><?php echo 0;?><?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?> data-category-id="<?php echo $_smarty_tpl->tpl_vars['sCategoryCurrent']->value;?>
"<?php }?>>

        
            <div class="box--content is--rounded">

                
                
                    <?php /*  Call merged included template "frontend/listing/product-box/product-badges.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-badges.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402ba15584_90069134($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-badges.tpl" */?>
                

                
                    <div class="product--info">

                        
                        
    <a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
       title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
"
       class="product--image">
        
            <span class="image--element">
            
                <span class="image--media">

                    <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true), null, 0);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'])){?>

                        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['description']){?>
                            <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['image']['description'], ENT_QUOTES, 'utf-8', true), null, 0);?>
                        <?php }?>

                        
                            <img srcset="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'][1]['sourceSet'];?>
"
                                 alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                                 title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                        
                    <?php }else{ ?>
                        <img src="/shopware/themes/Frontend/Responsive/frontend/_public/src/img/no-picture.jpg"
                             alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                             title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                    <?php }?>
                </span>
            
        </span>
        
    </a>


                        
                        
                            <div class="product--rating-container">
                                <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['sVoteAverage']['average']){?>
                                    <?php /*  Call merged included template "frontend/_includes/rating.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('frontend/_includes/rating.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('points'=>$_smarty_tpl->tpl_vars['sArticle']->value['sVoteAverage']['average'],'type'=>"aggregated",'label'=>false,'microData'=>false), 0, '186065642402b7a8377-82486028');
content_5642402babd523_42471411($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/_includes/rating.tpl" */?>
                                <?php }?>
                            </div>
                        

                        
                        
                            <a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
                               class="product--title"
                               title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
">
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sArticle']->value['articleName'],50);?>

                            </a>
                        

                        
                        

                        
                            <div class="product--price-info">

                                
                                
                                    <?php /*  Call merged included template "frontend/listing/product-box/product-price-unit.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price-unit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bb71052_43880230($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price-unit.tpl" */?>
                                

                                
                                
                                    <?php /*  Call merged included template "frontend/listing/product-box/product-price.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bba3cd0_08953783($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price.tpl" */?>
                                
                            </div>
                        

                        
                        
                            <?php /*  Call merged included template "frontend/listing/product-box/product-actions.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bbd2ae7_80059901($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-actions.tpl" */?>
                        
                    </div>
                
            </div>
        
    </div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-badges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402ba15584_90069134')) {function content_5642402ba15584_90069134($_smarty_tpl) {?>



	<div class="product--badges">

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
				<div class="product--badge badge--discount">
                    <i class="icon--percent2"></i>
                </div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['highlight']){?>
                <div class="product--badge badge--recommend">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
TIPP!<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            <?php }?>
        

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['newArticle']){?>
				<div class="product--badge badge--newcomer">
					<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
NEU<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['esd']){?>
                <div class="product--badge badge--esd">
                    <i class="icon--download"></i>
                </div>
            <?php }?>
        
	</div>







<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-image.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402ba40500_12400945')) {function content_5642402ba40500_12400945($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
   title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
"
   class="product--image">
    
        <span class="image--element">
            
                <span class="image--media">

                    <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true), null, 0);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'])){?>

                        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['description']){?>
                            <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['image']['description'], ENT_QUOTES, 'utf-8', true), null, 0);?>
                        <?php }?>

                        
                            <img srcset="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'][0]['sourceSet'];?>
"
                                 alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                                 title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                        
                    <?php }else{ ?>
                        <img src="/shopware/themes/Frontend/Responsive/frontend/_public/src/img/no-picture.jpg"
                             alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                             title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                    <?php }?>
                </span>
            
        </span>
    
</a><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\_includes\rating.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402babd523_42471411')) {function content_5642402babd523_42471411($_smarty_tpl) {?>

    <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable('single', null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['type']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable($_smarty_tpl->tpl_vars['type']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable(10, null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['base']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable($_smarty_tpl->tpl_vars['base']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(true, null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['microData']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable($_smarty_tpl->tpl_vars['microData']->value, null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value&&$_smarty_tpl->tpl_vars['isType']->value==='aggregated'&&$_smarty_tpl->tpl_vars['count']->value===0){?> 
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='single'){?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"', null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"', null, 0);?>
    <?php }?>




    <?php if (isset($_smarty_tpl->tpl_vars['label']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['label']->value, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(true, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <span class="product--rating"<?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?> <?php echo $_smarty_tpl->tpl_vars['data']->value;?>
<?php }?>>

        
        
            <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value/2, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['isBase']->value==5){?>
                <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value, null, 0);?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?>
                <meta itemprop="ratingValue" content="<?php echo $_smarty_tpl->tpl_vars['points']->value;?>
">
                <meta itemprop="worstRating" content="1">
                <meta itemprop="bestRating" content="<?php echo $_smarty_tpl->tpl_vars['isBase']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
                    <meta itemprop="ratingCount" content="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                <?php }?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['points']->value!=0){?>
                <?php $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int)ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0){
for ($_smarty_tpl->tpl_vars['value']->value = 1, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++){
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration == 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration == $_smarty_tpl->tpl_vars['value']->total;?>
                    <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star', null, 0);?>

                    <?php if ($_smarty_tpl->tpl_vars['value']->value>$_smarty_tpl->tpl_vars['average']->value){?>
                        <?php $_smarty_tpl->tpl_vars['diff'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value-$_smarty_tpl->tpl_vars['average']->value, null, 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['diff']->value>0&&$_smarty_tpl->tpl_vars['diff']->value<=0.5){?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-half', null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-empty', null, 0);?>
                        <?php }?>
                    <?php }?>

                    <i class="<?php echo $_smarty_tpl->tpl_vars['cls']->value;?>
"></i>
                <?php }} ?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasLabel']->value&&$_smarty_tpl->tpl_vars['count']->value){?>
                <span class="rating--count-wrapper">
                    (<span class="rating--count"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</span>)
                </span>
            <?php }?>
        
    </span>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price-unit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bb71052_43880230')) {function content_5642402bb71052_43880230($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="price--unit">

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=0){?>

        
        
            <span class="price--label label--purchase-unit is--bold is--nowrap">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Inhalt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        

        
        
            <span class="is--nowrap">
                <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>

            </span>
        
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=$_smarty_tpl->tpl_vars['sArticle']->value['referenceunit']){?>

        
        
            <span class="is--nowrap">
                (<?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['referenceprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 / <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['referenceunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>
)
            </span>
        
    <?php }?>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bba3cd0_08953783')) {function content_5642402bba3cd0_08953783($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="product--price">

    
    
        <span class="price--default is--nowrap<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?> is--discount<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['priceStartingFrom']&&!$_smarty_tpl->tpl_vars['sArticle']->value['liveshoppingData']){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ab<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php }?>
            <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['price']);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </span>
    

    
    
        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
            <span class="price--discount is--nowrap">
                <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['pseudoprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        <?php }?>
    
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bbd2ae7_80059901')) {function content_5642402bbd2ae7_80059901($_smarty_tpl) {?>

<div class="product--actions">

    
    
        <?php ob_start();?><?php echo 1;?><?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
            <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'compare', 'action' => 'add_article', 'articleID' => $_smarty_tpl->tpl_vars['sArticle']->value['articleID'], ))); ?>"
               title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
               class="product--action action--compare"
               data-product-compare-add="true"
               rel="nofollow">
                <i class="icon--compare"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </a>
        <?php }?>
    

    
    
        <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'add', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           title="<?php ob_start();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo "Auf den Merkzettel";?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_tmp2=ob_get_clean();?><?php echo htmlspecialchars($_tmp2, ENT_QUOTES, 'utf-8', true);?>
"
           class="product--action action--note"
           data-ajaxUrl="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'ajaxAdd', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           data-text="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Gemerkt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
           rel="nofollow">
            <i class="icon--heart"></i> <span class="action--text"><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Merken<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        </a>
    

    
    

    
    
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\box-product-slider.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bc1ce73_19708196')) {function content_5642402bc1ce73_19708196($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>


    <div class="product--box box--<?php echo $_smarty_tpl->tpl_vars['productBoxLayout']->value;?>
"
         data-page-index="<?php echo $_smarty_tpl->tpl_vars['pageIndex']->value;?>
"
         data-ordernumber="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'];?>
"
         <?php ob_start();?><?php echo 0;?><?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?> data-category-id="<?php echo $_smarty_tpl->tpl_vars['sCategoryCurrent']->value;?>
"<?php }?>>

        
            <div class="box--content is--rounded">

                
                
                    <?php /*  Call merged included template "frontend/listing/product-box/product-badges.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-badges.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bc34581_71750639($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-badges.tpl" */?>
                

                
                    <div class="product--info">

                        
                        
                            <?php /*  Call merged included template "frontend/listing/product-box/product-image.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bc63383_38159292($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-image.tpl" */?>
                        

                        
                        

                        
                        
                            <a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
                               class="product--title"
                               title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
">
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sArticle']->value['articleName'],50);?>

                            </a>
                        

                        
                        

                        
                            <div class="product--price-info">

                                
                                
                                    <?php /*  Call merged included template "frontend/listing/product-box/product-price-unit.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price-unit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bd556c2_46878143($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price-unit.tpl" */?>
                                

                                
                                
                                    <?php /*  Call merged included template "frontend/listing/product-box/product-price.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402bd8c1d5_82836277($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price.tpl" */?>
                                
                            </div>
                        

                        
                        
                    </div>
                
            </div>
        
    </div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-badges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bc34581_71750639')) {function content_5642402bc34581_71750639($_smarty_tpl) {?>



	<div class="product--badges">

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
				<div class="product--badge badge--discount">
                    <i class="icon--percent2"></i>
                </div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['highlight']){?>
                <div class="product--badge badge--recommend">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
TIPP!<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            <?php }?>
        

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['newArticle']){?>
				<div class="product--badge badge--newcomer">
					<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
NEU<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['esd']){?>
                <div class="product--badge badge--esd">
                    <i class="icon--download"></i>
                </div>
            <?php }?>
        
	</div>







<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-image.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bc63383_38159292')) {function content_5642402bc63383_38159292($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
   title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
"
   class="product--image">
    
        <span class="image--element">
            
                <span class="image--media">

                    <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true), null, 0);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'])){?>

                        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['description']){?>
                            <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['image']['description'], ENT_QUOTES, 'utf-8', true), null, 0);?>
                        <?php }?>

                        
                            <img srcset="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'][0]['sourceSet'];?>
"
                                 alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                                 title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                        
                    <?php }else{ ?>
                        <img src="/shopware/themes/Frontend/Responsive/frontend/_public/src/img/no-picture.jpg"
                             alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                             title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                    <?php }?>
                </span>
            
        </span>
    
</a><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\_includes\rating.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bca5a13_94067425')) {function content_5642402bca5a13_94067425($_smarty_tpl) {?>

    <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable('single', null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['type']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable($_smarty_tpl->tpl_vars['type']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable(10, null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['base']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable($_smarty_tpl->tpl_vars['base']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(true, null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['microData']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable($_smarty_tpl->tpl_vars['microData']->value, null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value&&$_smarty_tpl->tpl_vars['isType']->value==='aggregated'&&$_smarty_tpl->tpl_vars['count']->value===0){?> 
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='single'){?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"', null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"', null, 0);?>
    <?php }?>




    <?php if (isset($_smarty_tpl->tpl_vars['label']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['label']->value, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(true, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <span class="product--rating"<?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?> <?php echo $_smarty_tpl->tpl_vars['data']->value;?>
<?php }?>>

        
        
            <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value/2, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['isBase']->value==5){?>
                <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value, null, 0);?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?>
                <meta itemprop="ratingValue" content="<?php echo $_smarty_tpl->tpl_vars['points']->value;?>
">
                <meta itemprop="worstRating" content="1">
                <meta itemprop="bestRating" content="<?php echo $_smarty_tpl->tpl_vars['isBase']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
                    <meta itemprop="ratingCount" content="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                <?php }?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['points']->value!=0){?>
                <?php $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int)ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0){
for ($_smarty_tpl->tpl_vars['value']->value = 1, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++){
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration == 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration == $_smarty_tpl->tpl_vars['value']->total;?>
                    <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star', null, 0);?>

                    <?php if ($_smarty_tpl->tpl_vars['value']->value>$_smarty_tpl->tpl_vars['average']->value){?>
                        <?php $_smarty_tpl->tpl_vars['diff'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value-$_smarty_tpl->tpl_vars['average']->value, null, 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['diff']->value>0&&$_smarty_tpl->tpl_vars['diff']->value<=0.5){?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-half', null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-empty', null, 0);?>
                        <?php }?>
                    <?php }?>

                    <i class="<?php echo $_smarty_tpl->tpl_vars['cls']->value;?>
"></i>
                <?php }} ?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasLabel']->value&&$_smarty_tpl->tpl_vars['count']->value){?>
                <span class="rating--count-wrapper">
                    (<span class="rating--count"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</span>)
                </span>
            <?php }?>
        
    </span>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price-unit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bd556c2_46878143')) {function content_5642402bd556c2_46878143($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="price--unit">

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=0){?>

        
        
            <span class="price--label label--purchase-unit is--bold is--nowrap">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Inhalt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        

        
        
            <span class="is--nowrap">
                <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>

            </span>
        
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=$_smarty_tpl->tpl_vars['sArticle']->value['referenceunit']){?>

        
        
            <span class="is--nowrap">
                (<?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['referenceprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 / <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['referenceunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>
)
            </span>
        
    <?php }?>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bd8c1d5_82836277')) {function content_5642402bd8c1d5_82836277($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="product--price">

    
    
        <span class="price--default is--nowrap<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?> is--discount<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['priceStartingFrom']&&!$_smarty_tpl->tpl_vars['sArticle']->value['liveshoppingData']){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ab<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php }?>
            <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['price']);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </span>
    

    
    
        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
            <span class="price--discount is--nowrap">
                <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['pseudoprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        <?php }?>
    
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bdbafd5_06223488')) {function content_5642402bdbafd5_06223488($_smarty_tpl) {?>

<div class="product--actions">

    
    
        <?php ob_start();?><?php echo 1;?><?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
            <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'compare', 'action' => 'add_article', 'articleID' => $_smarty_tpl->tpl_vars['sArticle']->value['articleID'], ))); ?>"
               title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
               class="product--action action--compare"
               data-product-compare-add="true"
               rel="nofollow">
                <i class="icon--compare"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </a>
        <?php }?>
    

    
    
        <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'add', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           title="<?php ob_start();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo "Auf den Merkzettel";?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_tmp2=ob_get_clean();?><?php echo htmlspecialchars($_tmp2, ENT_QUOTES, 'utf-8', true);?>
"
           class="product--action action--note"
           data-ajaxUrl="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'ajaxAdd', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           data-text="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Gemerkt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
           rel="nofollow">
            <i class="icon--heart"></i> <span class="action--text"><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Merken<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        </a>
    

    
    

    
    
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\box-emotion.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402be091e2_01498534')) {function content_5642402be091e2_01498534($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>


    <div class="product--box box--<?php echo $_smarty_tpl->tpl_vars['productBoxLayout']->value;?>
" data-ordernumber="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'];?>
">

        
            <div class="box--content">

                
                
                    <?php if (!$_smarty_tpl->tpl_vars['imageOnly']->value){?>
                        <?php /*  Call merged included template "frontend/listing/product-box/product-badges.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-badges.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c101378_45459267($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-badges.tpl" */?>
                    <?php }?>
                

                
                    <div class="product--info">

                        
                        
                            <a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
                               title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
"
                               class="product--image<?php if ($_smarty_tpl->tpl_vars['imageOnly']->value){?> is--large<?php }?>">

                                
                                    <span class="image--element">

                                        
                                            <span class="image--media">

                                                
                                                    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails']){?>

                                                        <?php $_smarty_tpl->tpl_vars['baseSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'][0]['source'], null, 0);?>

                                                        <?php if ($_smarty_tpl->tpl_vars['itemCols']->value&&$_smarty_tpl->tpl_vars['emotion']->value['grid']['cols']){?>
                                                            <?php $_smarty_tpl->tpl_vars['colSize'] = new Smarty_variable(100/$_smarty_tpl->tpl_vars['emotion']->value['grid']['cols'], null, 0);?>
                                                            <?php $_smarty_tpl->tpl_vars['itemSize'] = new Smarty_variable(((string)($_smarty_tpl->tpl_vars['itemCols']->value*$_smarty_tpl->tpl_vars['colSize']->value))."vw", null, 0);?>
                                                        <?php }else{ ?>
                                                            <?php $_smarty_tpl->tpl_vars['itemSize'] = new Smarty_variable("200px", null, 0);?>
                                                        <?php }?>

                                                        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value){
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->index++;
?>
                                                            <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['image']->index!==0){?><?php echo (string)$_smarty_tpl->tpl_vars['srcSet']->value;?><?php echo ", ";?><?php }?><?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['srcSet'] = new Smarty_variable($_tmp1.((string)$_smarty_tpl->tpl_vars['image']->value['source'])." ".((string)$_smarty_tpl->tpl_vars['image']->value['maxWidth'])."w", null, 0);?>

                                                            <?php if ($_smarty_tpl->tpl_vars['image']->value['retinaSource']){?>
                                                                <?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['image']->index!==0){?><?php echo (string)$_smarty_tpl->tpl_vars['srcSetRetina']->value;?><?php echo ", ";?><?php }?><?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['srcSetRetina'] = new Smarty_variable($_tmp2.((string)$_smarty_tpl->tpl_vars['image']->value['retinaSource'])." ".((string)$_smarty_tpl->tpl_vars['image']->value['maxWidth'])."w", null, 0);?>
                                                            <?php }?>
                                                        <?php } ?>
                                                    <?php }elseif($_smarty_tpl->tpl_vars['sArticle']->value['image']['source']){?>
                                                        <?php $_smarty_tpl->tpl_vars['baseSource'] = new Smarty_variable($_smarty_tpl->tpl_vars['sArticle']->value['image']['source'], null, 0);?>
                                                    <?php }else{ ?>
                                                        <?php ob_start();?>/shopware/themes/Frontend/Responsive/frontend/_public/src/img/no-picture.jpg<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['baseSource'] = new Smarty_variable($_tmp3, null, 0);?>
                                                    <?php }?>

                                                    <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true), null, 0);?>

                                                    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['description']){?>
                                                        <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['image']['description'], ENT_QUOTES, 'utf-8', true), null, 0);?>
                                                    <?php }?>

                                                    <picture>
                                                        <?php if ($_smarty_tpl->tpl_vars['srcSetRetina']->value){?><source sizes="(min-width: 48em) <?php echo $_smarty_tpl->tpl_vars['itemSize']->value;?>
, 100vw" srcset="<?php echo $_smarty_tpl->tpl_vars['srcSetRetina']->value;?>
" media="(min-resolution: 192dpi)" /><?php }?>
                                                        <?php if ($_smarty_tpl->tpl_vars['srcSet']->value){?><source sizes="(min-width: 48em) <?php echo $_smarty_tpl->tpl_vars['itemSize']->value;?>
, 100vw" srcset="<?php echo $_smarty_tpl->tpl_vars['srcSet']->value;?>
" /><?php }?>
                                                        <img src="<?php echo $_smarty_tpl->tpl_vars['baseSource']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
" title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                                                    </picture>
                                                
                                            </span>
                                        
                                    </span>
                                
                            </a>
                        

                        <?php if (!$_smarty_tpl->tpl_vars['imageOnly']->value){?>
                            <div class="product--details">

                                
                                
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
                                       class="product--title"
                                       title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
">
                                        <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sArticle']->value['articleName'],50);?>

                                    </a>
                                

                                
                                    <div class="product--price-info">

                                        
                                        
                                            <?php /*  Call merged included template "frontend/listing/product-box/product-price-unit.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price-unit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c1b8d21_86093003($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price-unit.tpl" */?>
                                        

                                        
                                        
                                            <?php /*  Call merged included template "frontend/listing/product-box/product-price.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c1eb9a8_25301182($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price.tpl" */?>
                                        
                                    </div>
                                
                            </div>
                        <?php }?>
                    </div>
                
            </div>
        
    </div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-badges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402be72983_38451807')) {function content_5642402be72983_38451807($_smarty_tpl) {?>



	<div class="product--badges">

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
				<div class="product--badge badge--discount">
                    <i class="icon--percent2"></i>
                </div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['highlight']){?>
                <div class="product--badge badge--recommend">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
TIPP!<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            <?php }?>
        

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['newArticle']){?>
				<div class="product--badge badge--newcomer">
					<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
NEU<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['esd']){?>
                <div class="product--badge badge--esd">
                    <i class="icon--download"></i>
                </div>
            <?php }?>
        
	</div>







<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-image.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bea1799_62358361')) {function content_5642402bea1799_62358361($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
   title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
"
   class="product--image">
    
        <span class="image--element">
            
                <span class="image--media">

                    <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true), null, 0);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'])){?>

                        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['description']){?>
                            <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['image']['description'], ENT_QUOTES, 'utf-8', true), null, 0);?>
                        <?php }?>

                        
                            <img srcset="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'][0]['sourceSet'];?>
"
                                 alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                                 title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                        
                    <?php }else{ ?>
                        <img src="/shopware/themes/Frontend/Responsive/frontend/_public/src/img/no-picture.jpg"
                             alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                             title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                    <?php }?>
                </span>
            
        </span>
    
</a><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:19
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\_includes\rating.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402bee7ca5_68852515')) {function content_5642402bee7ca5_68852515($_smarty_tpl) {?>

    <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable('single', null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['type']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable($_smarty_tpl->tpl_vars['type']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable(10, null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['base']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable($_smarty_tpl->tpl_vars['base']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(true, null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['microData']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable($_smarty_tpl->tpl_vars['microData']->value, null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value&&$_smarty_tpl->tpl_vars['isType']->value==='aggregated'&&$_smarty_tpl->tpl_vars['count']->value===0){?> 
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='single'){?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"', null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"', null, 0);?>
    <?php }?>




    <?php if (isset($_smarty_tpl->tpl_vars['label']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['label']->value, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(true, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <span class="product--rating"<?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?> <?php echo $_smarty_tpl->tpl_vars['data']->value;?>
<?php }?>>

        
        
            <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value/2, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['isBase']->value==5){?>
                <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value, null, 0);?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?>
                <meta itemprop="ratingValue" content="<?php echo $_smarty_tpl->tpl_vars['points']->value;?>
">
                <meta itemprop="worstRating" content="1">
                <meta itemprop="bestRating" content="<?php echo $_smarty_tpl->tpl_vars['isBase']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
                    <meta itemprop="ratingCount" content="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                <?php }?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['points']->value!=0){?>
                <?php $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int)ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0){
for ($_smarty_tpl->tpl_vars['value']->value = 1, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++){
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration == 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration == $_smarty_tpl->tpl_vars['value']->total;?>
                    <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star', null, 0);?>

                    <?php if ($_smarty_tpl->tpl_vars['value']->value>$_smarty_tpl->tpl_vars['average']->value){?>
                        <?php $_smarty_tpl->tpl_vars['diff'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value-$_smarty_tpl->tpl_vars['average']->value, null, 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['diff']->value>0&&$_smarty_tpl->tpl_vars['diff']->value<=0.5){?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-half', null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-empty', null, 0);?>
                        <?php }?>
                    <?php }?>

                    <i class="<?php echo $_smarty_tpl->tpl_vars['cls']->value;?>
"></i>
                <?php }} ?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasLabel']->value&&$_smarty_tpl->tpl_vars['count']->value){?>
                <span class="rating--count-wrapper">
                    (<span class="rating--count"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</span>)
                </span>
            <?php }?>
        
    </span>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price-unit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c055545_06696433')) {function content_5642402c055545_06696433($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="price--unit">

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=0){?>

        
        
            <span class="price--label label--purchase-unit is--bold is--nowrap">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Inhalt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        

        
        
            <span class="is--nowrap">
                <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>

            </span>
        
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=$_smarty_tpl->tpl_vars['sArticle']->value['referenceunit']){?>

        
        
            <span class="is--nowrap">
                (<?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['referenceprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 / <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['referenceunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>
)
            </span>
        
    <?php }?>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c0881d2_97755271')) {function content_5642402c0881d2_97755271($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="product--price">

    
    
        <span class="price--default is--nowrap<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?> is--discount<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['priceStartingFrom']&&!$_smarty_tpl->tpl_vars['sArticle']->value['liveshoppingData']){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ab<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php }?>
            <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['price']);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </span>
    

    
    
        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
            <span class="price--discount is--nowrap">
                <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['pseudoprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        <?php }?>
    
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c0b6fe6_53338233')) {function content_5642402c0b6fe6_53338233($_smarty_tpl) {?>

<div class="product--actions">

    
    
        <?php ob_start();?><?php echo 1;?><?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
            <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'compare', 'action' => 'add_article', 'articleID' => $_smarty_tpl->tpl_vars['sArticle']->value['articleID'], ))); ?>"
               title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
               class="product--action action--compare"
               data-product-compare-add="true"
               rel="nofollow">
                <i class="icon--compare"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </a>
        <?php }?>
    

    
    
        <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'add', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           title="<?php ob_start();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo "Auf den Merkzettel";?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_tmp2=ob_get_clean();?><?php echo htmlspecialchars($_tmp2, ENT_QUOTES, 'utf-8', true);?>
"
           class="product--action action--note"
           data-ajaxUrl="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'ajaxAdd', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           data-text="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Gemerkt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
           rel="nofollow">
            <i class="icon--heart"></i> <span class="action--text"><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Merken<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        </a>
    

    
    

    
    
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-badges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c101378_45459267')) {function content_5642402c101378_45459267($_smarty_tpl) {?>



	<div class="product--badges">

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
				<div class="product--badge badge--discount">
                    <i class="icon--percent2"></i>
                </div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['highlight']){?>
                <div class="product--badge badge--recommend">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
TIPP!<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            <?php }?>
        

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['newArticle']){?>
				<div class="product--badge badge--newcomer">
					<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
NEU<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['esd']){?>
                <div class="product--badge badge--esd">
                    <i class="icon--download"></i>
                </div>
            <?php }?>
        
	</div>







<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price-unit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c1b8d21_86093003')) {function content_5642402c1b8d21_86093003($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="price--unit">

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=0){?>

        
        
            <span class="price--label label--purchase-unit is--bold is--nowrap">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Inhalt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        

        
        
            <span class="is--nowrap">
                <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>

            </span>
        
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=$_smarty_tpl->tpl_vars['sArticle']->value['referenceunit']){?>

        
        
            <span class="is--nowrap">
                (<?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['referenceprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 / <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['referenceunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>
)
            </span>
        
    <?php }?>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c1eb9a8_25301182')) {function content_5642402c1eb9a8_25301182($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="product--price">

    
    
        <span class="price--default is--nowrap<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?> is--discount<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['priceStartingFrom']&&!$_smarty_tpl->tpl_vars['sArticle']->value['liveshoppingData']){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ab<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php }?>
            <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['price']);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </span>
    

    
    
        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
            <span class="price--discount is--nowrap">
                <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['pseudoprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        <?php }?>
    
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\box-basic.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c21e638_36678477')) {function content_5642402c21e638_36678477($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>


    <div class="product--box box--<?php echo $_smarty_tpl->tpl_vars['productBoxLayout']->value;?>
"
         data-page-index="<?php echo $_smarty_tpl->tpl_vars['pageIndex']->value;?>
"
         data-ordernumber="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'];?>
"
         <?php ob_start();?><?php echo 0;?><?php $_tmp1=ob_get_clean();?><?php if (!$_tmp1){?> data-category-id="<?php echo $_smarty_tpl->tpl_vars['sCategoryCurrent']->value;?>
"<?php }?>>

        
            <div class="box--content is--rounded">

                
                
                    <?php /*  Call merged included template "frontend/listing/product-box/product-badges.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-badges.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c231eb1_07139665($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-badges.tpl" */?>
                

                
                    <div class="product--info">

                        
                        
                            <?php /*  Call merged included template "frontend/listing/product-box/product-image.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c25ce41_96826814($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-image.tpl" */?>
                        

                        
                        
                            <div class="product--rating-container">
                                <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['sVoteAverage']['average']){?>
                                    <?php /*  Call merged included template "frontend/_includes/rating.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('frontend/_includes/rating.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('points'=>$_smarty_tpl->tpl_vars['sArticle']->value['sVoteAverage']['average'],'type'=>"aggregated",'label'=>false,'microData'=>false), 0, '186065642402b7a8377-82486028');
content_5642402c2a71d9_17443181($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/_includes/rating.tpl" */?>
                                <?php }?>
                            </div>
                        

                        
                        
                            <a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
                               class="product--title"
                               title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
">
                                <?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['sArticle']->value['articleName'],50);?>

                            </a>
                        

                        
                        
                            <div class="product--description">
                                <?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['sArticle']->value['description_long']),240);?>

                            </div>
                        

                        
                            <div class="product--price-info">

                                
                                
                                    <?php /*  Call merged included template "frontend/listing/product-box/product-price-unit.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price-unit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c35eb84_24889948($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price-unit.tpl" */?>
                                

                                
                                
                                    <?php /*  Call merged included template "frontend/listing/product-box/product-price.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-price.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c395686_21640752($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-price.tpl" */?>
                                
                            </div>
                        

                        
                        
                            <?php /*  Call merged included template "frontend/listing/product-box/product-actions.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("frontend/listing/product-box/product-actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '186065642402b7a8377-82486028');
content_5642402c3c0615_87947925($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "frontend/listing/product-box/product-actions.tpl" */?>
                        
                    </div>
                
            </div>
        
    </div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-badges.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c231eb1_07139665')) {function content_5642402c231eb1_07139665($_smarty_tpl) {?>



	<div class="product--badges">

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
				<div class="product--badge badge--discount">
                    <i class="icon--percent2"></i>
                </div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['highlight']){?>
                <div class="product--badge badge--recommend">
                    <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
TIPP!<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxTip",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

                </div>
            <?php }?>
        

		
		
			<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['newArticle']){?>
				<div class="product--badge badge--newcomer">
					<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
NEU<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxNew",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

				</div>
			<?php }?>
		

        
        
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['esd']){?>
                <div class="product--badge badge--esd">
                    <i class="icon--download"></i>
                </div>
            <?php }?>
        
	</div>







<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-image.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c25ce41_96826814')) {function content_5642402c25ce41_96826814($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Smarty\\plugins\\modifier.truncate.php';
?>
<a href="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['linkDetails'];?>
"
   title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true);?>
"
   class="product--image">
    
        <span class="image--element">
            
                <span class="image--media">

                    <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['articleName'], ENT_QUOTES, 'utf-8', true), null, 0);?>

                    <?php if (isset($_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'])){?>

                        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['image']['description']){?>
                            <?php $_smarty_tpl->tpl_vars['desc'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['sArticle']->value['image']['description'], ENT_QUOTES, 'utf-8', true), null, 0);?>
                        <?php }?>

                        
                            <img srcset="<?php echo $_smarty_tpl->tpl_vars['sArticle']->value['image']['thumbnails'][0]['sourceSet'];?>
"
                                 alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                                 title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                        
                    <?php }else{ ?>
                        <img src="/shopware/themes/Frontend/Responsive/frontend/_public/src/img/no-picture.jpg"
                             alt="<?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
"
                             title="<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['desc']->value,25,'');?>
" />
                    <?php }?>
                </span>
            
        </span>
    
</a><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\_includes\rating.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c2a71d9_17443181')) {function content_5642402c2a71d9_17443181($_smarty_tpl) {?>

    <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable('single', null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['type']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isType'] = new Smarty_variable($_smarty_tpl->tpl_vars['type']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable(10, null, 0);?> 
    <?php if (isset($_smarty_tpl->tpl_vars['base']->value)){?>
        <?php $_smarty_tpl->tpl_vars['isBase'] = new Smarty_variable($_smarty_tpl->tpl_vars['base']->value, null, 0);?>
    <?php }?>




    <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(true, null, 0);?>
    <?php if (isset($_smarty_tpl->tpl_vars['microData']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable($_smarty_tpl->tpl_vars['microData']->value, null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value&&$_smarty_tpl->tpl_vars['isType']->value==='aggregated'&&$_smarty_tpl->tpl_vars['count']->value===0){?> 
        <?php $_smarty_tpl->tpl_vars['hasMicroData'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='single'){?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"', null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['data'] = new Smarty_variable('itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"', null, 0);?>
    <?php }?>




    <?php if (isset($_smarty_tpl->tpl_vars['label']->value)){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable($_smarty_tpl->tpl_vars['label']->value, null, 0);?>
    <?php }?>




    <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(true, null, 0);?>
    <?php }else{ ?>
        <?php $_smarty_tpl->tpl_vars['hasLabel'] = new Smarty_variable(false, null, 0);?>
    <?php }?>




    <span class="product--rating"<?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?> <?php echo $_smarty_tpl->tpl_vars['data']->value;?>
<?php }?>>

        
        
            <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value/2, null, 0);?>
            <?php if ($_smarty_tpl->tpl_vars['isBase']->value==5){?>
                <?php $_smarty_tpl->tpl_vars['average'] = new Smarty_variable($_smarty_tpl->tpl_vars['points']->value, null, 0);?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasMicroData']->value){?>
                <meta itemprop="ratingValue" content="<?php echo $_smarty_tpl->tpl_vars['points']->value;?>
">
                <meta itemprop="worstRating" content="1">
                <meta itemprop="bestRating" content="<?php echo $_smarty_tpl->tpl_vars['isBase']->value;?>
">
                <?php if ($_smarty_tpl->tpl_vars['isType']->value==='aggregated'){?>
                    <meta itemprop="ratingCount" content="<?php echo $_smarty_tpl->tpl_vars['count']->value;?>
">
                <?php }?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['points']->value!=0){?>
                <?php $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['value']->step = 1;$_smarty_tpl->tpl_vars['value']->total = (int)ceil(($_smarty_tpl->tpl_vars['value']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['value']->step));
if ($_smarty_tpl->tpl_vars['value']->total > 0){
for ($_smarty_tpl->tpl_vars['value']->value = 1, $_smarty_tpl->tpl_vars['value']->iteration = 1;$_smarty_tpl->tpl_vars['value']->iteration <= $_smarty_tpl->tpl_vars['value']->total;$_smarty_tpl->tpl_vars['value']->value += $_smarty_tpl->tpl_vars['value']->step, $_smarty_tpl->tpl_vars['value']->iteration++){
$_smarty_tpl->tpl_vars['value']->first = $_smarty_tpl->tpl_vars['value']->iteration == 1;$_smarty_tpl->tpl_vars['value']->last = $_smarty_tpl->tpl_vars['value']->iteration == $_smarty_tpl->tpl_vars['value']->total;?>
                    <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star', null, 0);?>

                    <?php if ($_smarty_tpl->tpl_vars['value']->value>$_smarty_tpl->tpl_vars['average']->value){?>
                        <?php $_smarty_tpl->tpl_vars['diff'] = new Smarty_variable($_smarty_tpl->tpl_vars['value']->value-$_smarty_tpl->tpl_vars['average']->value, null, 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['diff']->value>0&&$_smarty_tpl->tpl_vars['diff']->value<=0.5){?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-half', null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['cls'] = new Smarty_variable('icon--star-empty', null, 0);?>
                        <?php }?>
                    <?php }?>

                    <i class="<?php echo $_smarty_tpl->tpl_vars['cls']->value;?>
"></i>
                <?php }} ?>
            <?php }?>
        

        
        
            <?php if ($_smarty_tpl->tpl_vars['hasLabel']->value&&$_smarty_tpl->tpl_vars['count']->value){?>
                <span class="rating--count-wrapper">
                    (<span class="rating--count"><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</span>)
                </span>
            <?php }?>
        
    </span>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price-unit.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c35eb84_24889948')) {function content_5642402c35eb84_24889948($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="price--unit">

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=0){?>

        
        
            <span class="price--label label--purchase-unit is--bold is--nowrap">
                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Inhalt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"ListingBoxArticleContent",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        

        
        
            <span class="is--nowrap">
                <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>

            </span>
        
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']&&$_smarty_tpl->tpl_vars['sArticle']->value['purchaseunit']!=$_smarty_tpl->tpl_vars['sArticle']->value['referenceunit']){?>

        
        
            <span class="is--nowrap">
                (<?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['referenceprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 / <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['referenceunit'];?>
 <?php echo $_smarty_tpl->tpl_vars['sArticle']->value['sUnit']['description'];?>
)
            </span>
        
    <?php }?>
</div><?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-price.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c395686_21640752')) {function content_5642402c395686_21640752($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_currency')) include 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware\\engine\\Library\\Enlight\\Template/Plugins\\modifier.currency.php';
?>

<div class="product--price">

    
    
        <span class="price--default is--nowrap<?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?> is--discount<?php }?>">
            <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['priceStartingFrom']&&!$_smarty_tpl->tpl_vars['sArticle']->value['liveshoppingData']){?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
ab<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxArticleStartsAt','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <?php }?>
            <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['price']);?>

            <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

        </span>
    

    
    
        <?php if ($_smarty_tpl->tpl_vars['sArticle']->value['has_pseudoprice']){?>
            <span class="price--discount is--nowrap">
                <?php echo smarty_modifier_currency($_smarty_tpl->tpl_vars['sArticle']->value['pseudoprice']);?>

                <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"Star",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
*<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"Star",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </span>
        <?php }?>
    
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.12, created on 2015-11-10 20:06:20
         compiled from "C:\Users\jkeull\Documents\xampp\htdocs\shopware\themes\Frontend\Bare\frontend\listing\product-box\product-actions.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5642402c3c0615_87947925')) {function content_5642402c3c0615_87947925($_smarty_tpl) {?>

<div class="product--actions">

    
    
        <?php ob_start();?><?php echo 1;?><?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
            <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'compare', 'action' => 'add_article', 'articleID' => $_smarty_tpl->tpl_vars['sArticle']->value['articleID'], ))); ?>"
               title="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
               class="product--action action--compare"
               data-product-compare-add="true"
               rel="nofollow">
                <i class="icon--compare"></i> <?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Vergleichen<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'ListingBoxLinkCompare','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

            </a>
        <?php }?>
    

    
    
        <a href="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'add', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           title="<?php ob_start();?><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo "Auf den Merkzettel";?><?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>'DetailLinkNotepad','namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_tmp2=ob_get_clean();?><?php echo htmlspecialchars($_tmp2, ENT_QUOTES, 'utf-8', true);?>
"
           class="product--action action--note"
           data-ajaxUrl="<?php echo htmlspecialchars(Enlight_Application::Instance()->Front()->Router()->assemble(array('controller' => 'note', 'action' => 'ajaxAdd', 'ordernumber' => $_smarty_tpl->tpl_vars['sArticle']->value['ordernumber'], ))); ?>"
           data-text="<?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Gemerkt<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailNotepadMarked",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
           rel="nofollow">
            <i class="icon--heart"></i> <span class="action--text"><?php $_smarty_tpl->smarty->_tag_stack[] = array('snippet', array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article')); $_block_repeat=true; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
Merken<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo Enlight_Components_Snippet_Resource::compileSnippetBlock(array('name'=>"DetailLinkNotepadShort",'namespace'=>'frontend/listing/box_article'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span>
        </a>
    

    
    

    
    
</div><?php }} ?>