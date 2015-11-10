{if $sTrustedShops.excellence && $sTrustedShops.article.id}
    {* set to true if the trusted shop article isn't already in basket *}
    <div class="table_row trusted_shops">
        <form name="formSiegel" class="logo_large" method="post" action="https://www.trustedshops.com/shop/certificate.php" target="_blank">
            <input type="image" src="{link file='frontend/_resources/images/trusted_shops_large.png'}" title="{s name='WidgetsTrustedShopsHeadline' namespace='frontend/plugins/swag_trusted_shops/index'}{/s}"/>
            <input name="shop_id" type="hidden" value="{$sTrustedShops.id}"/>
        </form>
        <form method="post" action="{url controller='checkout' action='addArticle' sAdd=$sTrustedShops.article.tsProductID sTargetAction=$sTargetAction}">
            <div class="text">
                <h5>{s name='BasketTrustedShopHeadline' namespace='frontend/plugins/swag_trusted_shops/index'}Trusted Shops Käuferschutz (empfohlen){/s}</h5>

                <p>
                    {s name='BasketTrustedShopInfoText' namespace='frontend/plugins/swag_trusted_shops/index'}
                        Käuferschutz bis {$sTrustedShops.article.protectedAmountDecimal|currency} ({$sTrustedShops.article.grossFee|currency} inkl. MwSt.). Die im Käuferschutz enthaltene
                        <a title="Trusted Shops" href="http://www.trustedshops.com/shop/protection_conditions.php?shop_id={$sTrustedShops.id}" target="_blank">
                            Trusted Shops Garantie
                        </a>
                        sichert Ihren Online-Kauf ab. Mit der Übermittlung und
                        <a title="Trusted Shops" href="http://www.trustedshops.com/shop/data_privacy.php?shop_id={$sTrustedShops.id}" target="_blank">
                            Speicherung
                        </a>
                        meiner E-Mail-Adresse zur Abwicklung des Käuferschutzes durch Trusted Shops bin ich einverstanden.
                        <a title="Trusted Shops" href="http://www.trustedshops.com/shop/protection_conditions.php?shop_id={$sTrustedShops.id}" target="_blank">
                            Garantiebedingungen
                        </a>
                        für den Käuferschutz
                    {/s}
                </p>
                {if $sTrustedShops.displayProtectionBox}
                    <div class="ts_add_button">
                        <div class="ts_add_buyer_protect_image">
                            <img class="button_image" src="{link file='frontend/_resources/images/trusted_shops_small.png'}">
                        </div>
                        <div class="ts_add_buyer_protect_button">
                            <input type="submit" class="button-right small" id="trusted_shop" value="{s name='BasketAddTrustedShop' namespace='frontend/plugins/swag_trusted_shops/index'}Käuferschutz hinzufügen{/s}"/>
                        </div>
                    </div>
                {/if}
            </div>
        </form>
    </div>
{/if}