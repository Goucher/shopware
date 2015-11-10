{extends file="parent:frontend/plugins/index/delivery_informations.tpl"}

{block name="frontend_widgets_delivery_infos"}
	{if !$sArticle.trustedShopArticle}
		{$smarty.block.parent}
	{/if}
{/block}