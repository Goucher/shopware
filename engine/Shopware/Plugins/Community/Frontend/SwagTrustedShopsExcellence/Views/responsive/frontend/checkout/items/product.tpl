{extends file="parent:frontend/checkout/items/product.tpl"}

{block name="frontend_checkout_cart_item_image_container_inner"}
    {if $isArticleTsCustomerProtection}
        <a href="https://www.trustedshops.com/shop/certificate.php?shop_id={$sTrustedShops.id}" title="{s name='WidgetsTrustedLogo' namespace='frontend/plugins/swag_trusted_shops/index'}{/s}" class="thumb_image" target="_blank">
            <img src="{link file='frontend/_public/src/img/trusted_shops_medium.png'}"/>
        </a>
    {else}
        {$smarty.block.parent}
    {/if}

{/block}

{block name='frontend_checkout_cart_item_quantity_selection'}
    {if $isArticleTsCustomerProtection}
        <span class="swagTrustedShops-quantity">1</span>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}

{block name='frontend_checkout_cart_item_delivery_informations'}
    {if $isArticleTsCustomerProtection}

    {else}
        {$smarty.block.parent}
    {/if}
{/block}