{block name='frontend_checkout_cart_item_quantity'}
    {if $isArticleTsCustomerProtection}
        <div class="grid_1">
          1
        </div>
    {else}
        {$smarty.block.parent}
    {/if}
{/block}