{extends file='frontend/index/header.tpl'}

{* Keywords *}
{block name="frontend_index_header_meta_keywords"}{if $sCategoryContent.metaKeywords}{$sCategoryContent.metaKeywords}{/if}{/block}

{block name='frontend_index_header_meta_tags_opengraph'}

    {$description = "{s name='IndexMetaDescriptionStandard'}{/s}"}
    {if $sCategoryContent.cmstext}
        {$description = "{$sCategoryContent.cmstext|strip_tags|truncate:240|escape:'htmlall'}"}
    {elseif $sCategoryContent.metadescription}
        {$description = "{$sCategoryContent.metadescription|strip_tags|escape:'htmlall'}"}
    {/if}

    <meta property="og:type" content="product" />
    <meta property="og:site_name" content="{config name=sShopname}" />
    <meta property="og:title" content="{$sCategoryContent.name|escape:'htmlall'}" />
    <meta property="og:description" content="{$description}" />

    <meta name="twitter:card" content="product" />
    <meta name="twitter:site" content="{config name=sShopname}" />
    <meta name="twitter:title" content="{$sCategoryContent.name|escape:'htmlall'}" />
    <meta name="twitter:description" content="{$description}" />

    {* Images *}
    {if $sCategoryContent.media.path}
        {$metaImage = {$sCategoryContent.media.path}}
    {else}
        {foreach $sArticles as $sArticle}
            {if $sArticle@first}
                {$metaImage = $sArticle.image.source}
                {break}
            {/if}
        {/foreach}
    {/if}

    <meta property="og:image" content="{$metaImage}" />
    <meta name="twitter:image" content="{$metaImage}" />
{/block}

{* Description *}
{block name="frontend_index_header_meta_description"}{if $sCategoryContent.metadescription}{$sCategoryContent.metadescription|strip_tags|escape}{else}{s name="IndexMetaDescriptionStandard"}{/s}{/if}{/block}

{* Canonical link *}
{block name='frontend_index_header_canonical'}
    {* Count of available product pages *}
    {$pages = ceil($sNumberArticles / $criteria->getLimit())}

    {if {config name=seoIndexPaginationLinks} && $showListing && $pages > 1}
        {* Previous rel tag *}
        {if $sPage > 1}
            {$sCategoryContent.canonicalParams.sPage = $sPage - 1}
            <link rel="prev" href="{url params = $sCategoryContent.canonicalParams}">
        {/if}

        {* Next rel tag *}
        {if $pages >= $sPage + 1}
            {$sCategoryContent.canonicalParams.sPage = $sPage + 1}
            <link rel="next" href="{url params = $sCategoryContent.canonicalParams}">
        {/if}
    {elseif !{config name=seoIndexPaginationLinks} || !$showListing}
        <link rel="canonical" href="{url params = $sCategoryContent.canonicalParams}" />
    {/if}
{/block}

{* Title *}
{block name='frontend_index_header_title'}{strip}
    {if $sCategoryContent.metaTitle}
        {$sCategoryContent.metaTitle} | {config name=sShopname}
    {elseif $sCategoryContent.title}
        {$sCategoryContent.title}
    {else}
        {$smarty.block.parent}
    {/if}
{/strip}{/block}

{* RSS and Atom feeds *}
{block name="frontend_index_header_feeds"}
{/block}

{* Google optimized crawling *}
{block name='frontend_index_header_meta_tags' append}
    {if $hasEmotion && !$hasEscapedFragment}
        <meta name="fragment" content="!">
    {/if}
{/block}