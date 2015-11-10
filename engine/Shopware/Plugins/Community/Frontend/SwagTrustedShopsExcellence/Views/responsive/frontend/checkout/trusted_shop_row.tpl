{block name="frontend_checkout_trustedshops_header"}
	{if $sTrustedShops.excellence && $sTrustedShops.article.id}
		<div class="ts--cart-header">
			{block name="frontend_checkout_trustedshops_header_img"}
				<form name="formSiegel" class="cart-header--ts-form left" method="post" action="https://www.trustedshops.com/shop/certificate.php" target="_blank">
					<input class="ts-form--image" type="image" src="{link file='frontend/_public/src/img/trusted_shops_large.png'}" title="{s name='WidgetsTrustedShopsHeadline' namespace='frontend/plugins/swag_trusted_shops/index'}{/s}"/>
					<input name="shop_id" type="hidden" value="{$sTrustedShops.id}"/>
				</form>
			{/block}

			{block name="frontend_checkout_trustedshops_header_main"}
				<div class="cart-header--ts-text left">
					{block name="frontend_checkout_trustedshops_header_form"}
						<form method="post" action="{url controller='checkout' action='addArticle' sAdd=$sTrustedShops.article.tsProductID sTargetAction=$sTargetAction}">
							{block name="frontend_checkout_trustedshops_header_form_headline"}
								<h2 class="ts-text--headline2">{s name='BasketTrustedShopHeadline' namespace='frontend/plugins/swag_trusted_shops/index'}Trusted Shops Käuferschutz (empfohlen){/s}</h2>
							{/block}

							{block name="frontend_checkout_trustedshops_header_form_text"}
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
							{/block}

							{block name="frontend_checkout_trustedshops_header_form_add"}
								{if $sTrustedShops.displayProtectionBox}
									<div class="ts-text--add-container">
										{block name="frontend_checkout_trustedshops_header_form_button"}
											<button class="ts-text--add-button btn is--small" type="submit">
												{block name="frontend_checkout_trustedshops_header_form_button_icon"}
													<img src="{link file='frontend/_public/src/img/trusted_shops_medium.png'}" class="ts-text--img" />
												{/block}

												{s name='BasketAddTrustedShop' namespace='frontend/plugins/swag_trusted_shops/index'}Käuferschutz hinzufügen{/s}
											</button>
										{/block}

									</div>
								{/if}
							{/block}
						</form>
					{/block}
				</div>
			{/block}

			<div class="ts--clear"></div>
		</div>
	{/if}
{/block}