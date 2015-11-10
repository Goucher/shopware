{extends file="parent:frontend/index/footer-navigation.tpl"}

{* add data to the template for the rating widget which is appended to the footer via jquery *}
{block name='frontend_index_footer_column_service_hotline_content' append}
	{if $sTrustedShops.rating_active}
		{block name="frontend_index_trustedshops_votes"}
			<div class="ts--user-votes">
				<a class="user-votes--link" target="_blank" href="{$sTrustedShops.rating_link}" title="{s namespace='frontend/plugins/swag_trusted_shops/index' name='tsVotesTitle'}{/s}">
					{block name="frontend_index_trustedshops_votes_img"}
						<img src="https://www.trustedshops.com/bewertung/widget/widgets/{$sTrustedShops.id}.gif" id="tsWidgetImage">
					{/block}
				</a>
			</div>
		{/block}
	{/if}
{/block}