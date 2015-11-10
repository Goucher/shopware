{extends file="parent:frontend/checkout/error_messages.tpl"}

{block name='frontend_checkout_error_messages_basket_error' append}
	{if $sTsArticleRemoved}
		{include file="frontend/_includes/messages.tpl" type="error" content="{s namespace='frontend/plugins/swag_trusted_shops/index' name='CartTrustedShopArticleRemoved'}{/s}"}
	{/if}
{/block}