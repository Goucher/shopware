{block name='frontend_checkout_cart_item_delete_article'}{/block}

{block name='frontend_checkout_cart_item_delivery_informations'}{/block}

{block name='frontend_checkout_cart_item_quantity'}{/block}

{* Article price *}
{block name='frontend_checkout_cart_item_price'}
    {if $sBasketItem.trustedShopArticle && !$isEmotionTemplate}
        <div class="grid_6">&nbsp;</div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}

{block name='frontend_checkout_finish_teaser' append}
    {* Trusted shops form *}
    {if $sTrustedShops.id}
        {include file='frontend/plugins/swag_trusted_shops/checkout/form.tpl'}
    {/if}
{/block}