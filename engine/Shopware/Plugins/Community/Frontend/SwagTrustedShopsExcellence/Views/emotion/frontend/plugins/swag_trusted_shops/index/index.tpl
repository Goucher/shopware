{block name='frontend_index_header_css_screen' append}
    <link type="text/css" media="all" rel="stylesheet" href="{link file='frontend/_resources/styles/trusted_shops.css'}"/>
{/block}

{block name='frontend_index_body_inline' append}
    <script type="text/javascript" src="{link file='frontend/_resources/javascript/jquery.trustedShops.js'}"></script>
    {$sTrustedShops.trustBadgeCode}
{/block}

{* Search *}
{block name='frontend_index_search' prepend}
    {* Trusted Shops div for later use *}
    <div id="hereComesMyCustomTrustbadge">

    </div>
{/block}

{* add data to the template for the rating widget which is appended to the footer via jquery *}
{block name='frontend_index_footer_menu' append}
    {if $sTrustedShops.rating_active}
        <div id="trustedShopsDataForWidget">
            <span id="href">{$sTrustedShops.rating_link}</span>
            <span id="title">{s namespace='frontend/plugins/swag_trusted_shops/index' name='tsVotesTitle'}{/s}</span>
            <span id="imgSrc">https://www.trustedshops.com/bewertung/widget/widgets/{$sTrustedShops.id}.gif</span>
        </div>
    {/if}
{/block}