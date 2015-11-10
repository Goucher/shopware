{extends file="parent:frontend/checkout/cart_item.tpl"}

{block name='frontend_checkout_cart_item_product'}
    {if $sBasketItem.ordernumber == $sTsArticleNumber}
        {$isArticleTsCustomerProtection = true}
        {include file="frontend/checkout/items/product.tpl" isLast=$isLast}
    {else}
        {$smarty.block.parent}
    {/if}
{/block}