{if !$sUserData.additional.charge_vat}
    {assign var='sRealAmount' value=$sAmountNet|replace:',':'.'}
{else}
    {if $sAmountWithTax}
        {assign var='sRealAmount' value=$sAmountWithTax|replace:',':'.'}
    {else}
        {assign var='sRealAmount' value=$sAmount|replace:',':'.'}
    {/if}
{/if}

{if $sTrustedShops.rating_buttons}
    <div class="ts-panel">
        <h2 class="center">{s namespace='frontend/plugins/swag_trusted_shops/index' name='ratingHeadline'}{/s}</h2>
        <div class="center button-panel">

            <!-- Vote later -->
            <div class="ts-vote-later">
                <form name="tsRateLaterButton" method="get" action="http://www.trustedshops.com/reviews/rateshoplater.php" target="_blank">
                    <input name="shop_id" type="hidden" value="{$sTrustedShops.id}">
                    <input name="buyerEmail" type="hidden" value="{$sUserData.additional.user.email|base64_encode}">
                    <input name="shopOrderID" type="hidden" value="{$sOrderNumber|base64_encode}">
                    <input name="days" type="hidden" value="{$sTrustedShops.rate_later_days}">
                    <input type="submit" value="{s namespace='frontend/plugins/swag_trusted_shops/index' name='rateLater'}{/s}" class="button-right large"/>
                </form>
                <p class="ts-info-text">
                    <small>
                        {s namespace='frontend/plugins/swag_trusted_shops/index' name='rateLaterText'}{/s}
                    </small>
                </p>
            </div>

            <!-- Vote now -->
            <div class="ts-vote-now">
                <form name="tsRateNowButton" method="get" action="https://www.trustedshops.com/buyerrating/rate_{$sTrustedShops.id}.html" target="_blank">
                    <input name="buyerEmail" type="hidden" value="{$sUserData.additional.user.email|base64_encode}">
                    <input name="shopOrderID" type="hidden" value="{$sOrderNumber|base64_encode}">
                    <input type="submit" value="{s namespace='frontend/plugins/swag_trusted_shops/index' name='rateNow'}{/s}" class="button-middle large"/>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="doublespace">&nbsp;</div>
{/if}

<noscript>
    <div class="trustedShopsForm">
        <div class="grid_3">
            <form name="formSiegel" method="post" action="https://www.trustedshops.com/shop/certificate.php" target="_blank">
                <input type="image" src="{link file='frontend/_resources/images/trusted_shops.gif'}" title="{s name='WidgetsTrustedShopsHeadline' namespace='frontend/plugins/swag_trusted_shops/index'}{/s}"/>
                <input name="shop_id" type="hidden" value="{$sTrustedShops.id}"/>
            </form>
        </div>
        <div class="grid_11">
            <form id="formTShops" name="formTShops" method="post" action="https://www.trustedshops.com/shop/protection.php" target="_blank">
                <input name="_charset_" type="hidden" value="{encoding}">
                <input name="shop_id" type="hidden" value="{$sTrustedShops.id}">
                <input name="email" type="hidden" value="{$sUserData.additional.user.email}">
                <input name="amount" type="hidden" value="{$sRealAmount}">
                <input name="curr" type="hidden" value="{config name=currency}">
                <input name="kdnr" type="hidden" value="{$sUserData.billingaddress.customernumber}">
                <input name="ordernr" type="hidden" value="{$sOrderNumber}">

                {* Descriptiontext *}
                <p>
                    {s name='WidgetsTrustedShopsText' namespace='frontend/plugins/swag_trusted_shops/index' class='actions'}{/s}
                </p>

                <input type="submit" class="button-right small" name="btnProtect"
                       value="{s name='WidgetsTrustedShopsInfo' namespace='frontend/plugins/swag_trusted_shops/index'}{/s}"/>
            </form>
        </div>
        <div class="clear">&nbsp;</div>
    </div>
</noscript>

<div id="trustedShopsCheckout">
    <span id="tsCheckoutOrderNr">{$sOrderNumber}</span>
    <span id="tsCheckoutBuyerEmail">{$sUserData.additional.user.email}</span>
    <span id="tsCheckoutBuyerId">{$sUserData.billingaddress.customernumber}</span>
    <span id="tsCheckoutOrderAmount">{$sRealAmount}</span>
    <span id="tsCheckoutOrderCurrency">{config name=currency}</span>
    <span id="tsCheckoutOrderPaymentType">{$sTrustedShops.paymentName}</span>
    <span id="tsCheckoutOrderEstDeliveryDate">{$sTrustedShops.deliveryDate}</span>
</div>