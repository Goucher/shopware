{extends file="parent:frontend/checkout/finish.tpl"}

{block name="frontend_checkout_finish_teaser" append}
	{* Trusted shops form *}
	{if $sTrustedShops.id}
		{if !$sUserData.additional.charge_vat}
			{assign var='sRealAmount' value=$sAmountNet|replace:',':'.'}
		{else}
			{if $sAmountWithTax}
				{assign var='sRealAmount' value=$sAmountWithTax|replace:',':'.'}
			{else}
				{assign var='sRealAmount' value=$sAmount|replace:',':'.'}
			{/if}
		{/if}

		{block name="frontend_checkout_trustedshops_votepanel"}
			{if $sTrustedShops.rating_buttons}
				<div class="ts--vote-panel">
					{block name="frontend_checkout_trustedshops_votepanel_headline"}
						<h2 class="vote-panel--ts-vote-headline">{s namespace='frontend/plugins/swag_trusted_shops/index' name='ratingHeadline'}{/s}</h2>
					{/block}

					{block name="frontend_checkout_trustedshops_votepanel_container"}
						<div class="vote-panel--ts-vote-container">
							<!-- Vote later -->
							{block name="frontend_checkout_trustedshops_votepanel_later"}
								<div class="ts-vote-container ts-vote-container--vote-later">
									{block name="frontend_checkout_trustedshops_votepanel_later_form"}
										<form name="tsRateLaterButton" method="get" action="http://www.trustedshops.com/reviews/rateshoplater.php" target="_blank">
											<input name="shop_id" type="hidden" value="{$sTrustedShops.id}">
											<input name="buyerEmail" type="hidden" value="{$sUserData.additional.user.email|base64_encode}">
											<input name="shopOrderID" type="hidden" value="{$sOrderNumber|base64_encode}">
											<input name="days" type="hidden" value="{$sTrustedShops.rate_later_days}">
											{block name="frontend_checkout_trustedshops_votepanel_later_button"}
												<input class="ts-vote--button vote-later--button btn is--primary" type="submit" value="{s namespace='frontend/plugins/swag_trusted_shops/index' name='rateLater'}{/s}"/>
											{/block}
										</form>
									{/block}

									{block name="frontend_checkout_trustedshops_votepanel_later_text"}
										<p class="ts-info-text">
											{s namespace='frontend/plugins/swag_trusted_shops/index' name='rateLaterText'}{/s}
										</p>
									{/block}
								</div>
							{/block}

							<!-- Vote now -->
							{block name="frontend_checkout_trustedshops_votepanel_now"}
								<div class="ts-vote-container ts-vote-container--vote-now">
									{block name="frontend_checkout_trustedshops_votepanel_now_form"}
										<form name="tsRateNowButton" method="get" action="https://www.trustedshops.com/buyerrating/rate_{$sTrustedShops.id}.html" target="_blank">
											<input name="buyerEmail" type="hidden" value="{$sUserData.additional.user.email|base64_encode}">
											<input name="shopOrderID" type="hidden" value="{$sOrderNumber|base64_encode}">
											{block name="frontend_checkout_trustedshops_votepanel_now_button"}
												<input class="ts-vote--button btn is--secondary" type="submit" value="{s namespace='frontend/plugins/swag_trusted_shops/index' name='rateNow'}{/s}"/>
											{/block}
										</form>
									{/block}
								</div>
							{/block}

							<div class="ts--clear"></div>
						</div>
					{/block}
				</div>
			{/if}
		{/block}

		{block name="frontend_checkout_trustedshops_noscript"}
			<noscript>
				{block name="frontend_checkout_trustedshops_noscript_container"}
					<div class="ts--no-js-container">
						{block name="frontend_checkout_trustedshops_noscript_logo"}
							<div class="no-js-container--ts-logo left">
								<form name="formSiegel" method="post" action="https://www.trustedshops.com/shop/certificate.php" target="_blank">
									<input type="image" src="{link file='frontend/_public/src/img/trusted_shops.gif'}" title="{s name='WidgetsTrustedShopsHeadline' namespace='frontend/plugins/swag_trusted_shops/index'}{/s}"/>
									<input name="shop_id" type="hidden" value="{$sTrustedShops.id}"/>
								</form>
							</div>
						{/block}
						{block name="frontend_checkout_trustedshops_noscript_text"}
							<div class="no-js-container--ts-text">
								{block name="frontend_checkout_trustedshops_noscript_form"}
									<form id="formTShops" name="formTShops" method="post" action="https://www.trustedshops.com/shop/protection.php" target="_blank">
										{block name="frontend_checkout_trustedshops_noscript_form_values"}
											<input name="_charset_" type="hidden" value="{encoding}">
											<input name="shop_id" type="hidden" value="{$sTrustedShops.id}">
											<input name="email" type="hidden" value="{$sUserData.additional.user.email}">
											<input name="amount" type="hidden" value="{$sRealAmount}">
											<input name="curr" type="hidden" value="{config name=currency}">
											<input name="kdnr" type="hidden" value="{$sUserData.billingaddress.customernumber}">
											<input name="ordernr" type="hidden" value="{$sOrderNumber}">
										{/block}

										{*Descriptiontext*}
										{block name="frontend_checkout_trustedshops_noscript_form_text"}
											<p>
												{se name='WidgetsTrustedShopsText' namespace='frontend/plugins/swag_trusted_shops/index' class='actions'}{/se}
											</p>
										{/block}
										{block name="frontend_checkout_trustedshops_noscript_form_button"}
											<input type="submit" class="btn is--primary is--small" name="btnProtect"
												   value="{s name='WidgetsTrustedShopsInfo' namespace='frontend/plugins/swag_trusted_shops/index'}{/s}"/>
										{/block}
									</form>
								{/block}
							</div>
						{/block}
						<div class="ts--clear">&nbsp;</div>
					</div>
				{/block}
			</noscript>
		{/block}

		{block name="frontend_checkout_trustedshops_finish_values"}
			<div id="trustedShopsCheckout">
				<span id="tsCheckoutOrderNr">{$sOrderNumber}</span>
				<span id="tsCheckoutBuyerEmail">{$sUserData.additional.user.email}</span>
				<span id="tsCheckoutBuyerId">{$sUserData.billingaddress.customernumber}</span>
				<span id="tsCheckoutOrderAmount">{$sRealAmount}</span>
				<span id="tsCheckoutOrderCurrency">{config name=currency}</span>
				<span id="tsCheckoutOrderPaymentType">{$sTrustedShops.paymentName}</span>
				<span id="tsCheckoutOrderEstDeliveryDate">{"+2 day"|strtotime|date_format:"%Y-%m-%d"}</span>
			</div>
		{/block}

	{/if}
{/block}