{extends file="parent:frontend/index/index.tpl"}

{block name='frontend_index_header_javascript' append}
	{$sTrustedShops.trustBadgeCode}
{/block}

{* Search *}
{block name='frontend_index_search' prepend}
	{* Trusted Shops div for later use *}
	<div id="hereComesMyCustomTrustbadge">

	</div>
{/block}