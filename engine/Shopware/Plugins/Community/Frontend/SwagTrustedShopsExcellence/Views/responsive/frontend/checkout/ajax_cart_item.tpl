{extends file="parent:frontend/checkout/ajax_cart_item.tpl"}

{block name='frontend_checkout_ajax_cart_articleimage_product'}
    {if $sBasketItem.ordernumber == $sTsArticleNumber}
        <img src="{link file='frontend/_public/src/img/trusted_shops_medium.png'}"/>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}
