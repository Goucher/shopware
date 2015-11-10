<?php
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
class ShopwareProductionProjectContainer extends Shopware\Components\DependencyInjection\Container
{
    private $parameters;
    private $targetDirs = array();
    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->scopes = array();
        $this->scopeChildren = array();
        $this->methodMap = array(
            'acl' => 'getAclService',
            'application' => 'getApplicationService',
            'bootstrap' => 'getBootstrapService',
            'cache' => 'getCacheService',
            'cache_factory' => 'getCacheFactoryService',
            'categorydenormalization' => 'getCategorydenormalizationService',
            'categoryduplicator' => 'getCategoryduplicatorService',
            'categorysubscriber' => 'getCategorysubscriberService',
            'config' => 'getConfigService',
            'config_factory' => 'getConfigFactoryService',
            'config_writer' => 'getConfigWriterService',
            'corelogger' => 'getCoreloggerService',
            'cron' => 'getCronService',
            'cron_adapter' => 'getCronAdapterService',
            'currency' => 'getCurrencyService',
            'currency_factory' => 'getCurrencyFactoryService',
            'date' => 'getDateService',
            'db' => 'getDbService',
            'db_connection' => 'getDbConnectionService',
            'db_factory' => 'getDbFactoryService',
            'dbal_connection' => 'getDbalConnectionService',
            'debuglogger' => 'getDebugloggerService',
            'dispatcher' => 'getDispatcherService',
            'emotion_device_configuration' => 'getEmotionDeviceConfigurationService',
            'events' => 'getEventsService',
            'file_system' => 'getFileSystemService',
            'first_run_wizard_plugin_store' => 'getFirstRunWizardPluginStoreService',
            'front' => 'getFrontService',
            'front_factory' => 'getFrontFactoryService',
            'guzzle_http_client_factory' => 'getGuzzleHttpClientFactoryService',
            'hooks' => 'getHooksService',
            'http_cache_warmer' => 'getHttpCacheWarmerService',
            'http_client' => 'getHttpClientService',
            'js_compressor' => 'getJsCompressorService',
            'legacy_event_manager' => 'getLegacyEventManagerService',
            'legacy_listing_converter' => 'getLegacyListingConverterService',
            'legacy_search_converter' => 'getLegacySearchConverterService',
            'legacy_struct_converter' => 'getLegacyStructConverterService',
            'loader' => 'getLoaderService',
            'locale' => 'getLocaleService',
            'locale_factory' => 'getLocaleFactoryService',
            'mail' => 'getMailService',
            'mail_factory' => 'getMailFactoryService',
            'mailtransport' => 'getMailtransportService',
            'mailtransport_factory' => 'getMailtransportFactoryService',
            'model_annotations_factory' => 'getModelAnnotationsFactoryService',
            'model_factory' => 'getModelFactoryService',
            'modelannotations' => 'getModelannotationsService',
            'modelconfig' => 'getModelconfigService',
            'models' => 'getModelsService',
            'models_metadata_cache' => 'getModelsMetadataCacheService',
            'monolog.formatter.wildfire' => 'getMonolog_Formatter_WildfireService',
            'monolog.handler.chromephp' => 'getMonolog_Handler_ChromephpService',
            'monolog.handler.firephp' => 'getMonolog_Handler_FirephpService',
            'monolog.handler.main' => 'getMonolog_Handler_MainService',
            'monolog.processor.uid' => 'getMonolog_Processor_UidService',
            'multi_edit.product' => 'getMultiEdit_ProductService',
            'multi_edit.product.backup' => 'getMultiEdit_Product_BackupService',
            'multi_edit.product.batch_process' => 'getMultiEdit_Product_BatchProcessService',
            'multi_edit.product.dql_helper' => 'getMultiEdit_Product_DqlHelperService',
            'multi_edit.product.filter' => 'getMultiEdit_Product_FilterService',
            'multi_edit.product.grammar' => 'getMultiEdit_Product_GrammarService',
            'multi_edit.product.queue' => 'getMultiEdit_Product_QueueService',
            'multi_edit.product.value' => 'getMultiEdit_Product_ValueService',
            'oyejorge_compiler' => 'getOyejorgeCompilerService',
            'oyejorge_compiler_lib' => 'getOyejorgeCompilerLibService',
            'pluginlogger' => 'getPluginloggerService',
            'plugins' => 'getPluginsService',
            'plugins_factory' => 'getPluginsFactoryService',
            'query_alias_mapper' => 'getQueryAliasMapperService',
            'router' => 'getRouterService',
            'router_factory' => 'getRouterFactoryService',
            'session' => 'getSessionService',
            'session_factory' => 'getSessionFactoryService',
            'shop_page_menu' => 'getShopPageMenuService',
            'shopware.cache_manager' => 'getShopware_CacheManagerService',
            'shopware.escaper' => 'getShopware_EscaperService',
            'shopware.holiday_table_updater' => 'getShopware_HolidayTableUpdaterService',
            'shopware.snippet_database_handler' => 'getShopware_SnippetDatabaseHandlerService',
            'shopware.snippet_query_handler' => 'getShopware_SnippetQueryHandlerService',
            'shopware.snippet_validator' => 'getShopware_SnippetValidatorService',
            'shopware_elastic_search.backlog_processor' => 'getShopwareElasticSearch_BacklogProcessorService',
            'shopware_elastic_search.backlog_reader' => 'getShopwareElasticSearch_BacklogReaderService',
            'shopware_elastic_search.client' => 'getShopwareElasticSearch_ClientService',
            'shopware_elastic_search.composite_synchronizer' => 'getShopwareElasticSearch_CompositeSynchronizerService',
            'shopware_elastic_search.composite_synchronizer_factory' => 'getShopwareElasticSearch_CompositeSynchronizerFactoryService',
            'shopware_elastic_search.field_mapping' => 'getShopwareElasticSearch_FieldMappingService',
            'shopware_elastic_search.identifier_selector' => 'getShopwareElasticSearch_IdentifierSelectorService',
            'shopware_elastic_search.index_factory' => 'getShopwareElasticSearch_IndexFactoryService',
            'shopware_elastic_search.product_indexer' => 'getShopwareElasticSearch_ProductIndexerService',
            'shopware_elastic_search.product_mapping' => 'getShopwareElasticSearch_ProductMappingService',
            'shopware_elastic_search.product_provider' => 'getShopwareElasticSearch_ProductProviderService',
            'shopware_elastic_search.product_query_factory' => 'getShopwareElasticSearch_ProductQueryFactoryService',
            'shopware_elastic_search.product_synchronizer' => 'getShopwareElasticSearch_ProductSynchronizerService',
            'shopware_elastic_search.property_indexer' => 'getShopwareElasticSearch_PropertyIndexerService',
            'shopware_elastic_search.property_mapping' => 'getShopwareElasticSearch_PropertyMappingService',
            'shopware_elastic_search.property_provider' => 'getShopwareElasticSearch_PropertyProviderService',
            'shopware_elastic_search.property_query_factory' => 'getShopwareElasticSearch_PropertyQueryFactoryService',
            'shopware_elastic_search.property_synchronizer' => 'getShopwareElasticSearch_PropertySynchronizerService',
            'shopware_elastic_search.service_subscriber' => 'getShopwareElasticSearch_ServiceSubscriberService',
            'shopware_elastic_search.shop_analyzer' => 'getShopwareElasticSearch_ShopAnalyzerService',
            'shopware_elastic_search.shop_indexer' => 'getShopwareElasticSearch_ShopIndexerService',
            'shopware_elastic_search.shop_indexer_factory' => 'getShopwareElasticSearch_ShopIndexerFactoryService',
            'shopware_media.garbage_collector' => 'getShopwareMedia_GarbageCollectorService',
            'shopware_media.garbage_collector_factory' => 'getShopwareMedia_GarbageCollectorFactoryService',
            'shopware_media.media_migration' => 'getShopwareMedia_MediaMigrationService',
            'shopware_media.media_service' => 'getShopwareMedia_MediaServiceService',
            'shopware_media.media_service_factory' => 'getShopwareMedia_MediaServiceFactoryService',
            'shopware_media.service_subscriber' => 'getShopwareMedia_ServiceSubscriberService',
            'shopware_media.strategy' => 'getShopwareMedia_StrategyService',
            'shopware_media.strategy_factory' => 'getShopwareMedia_StrategyFactoryService',
            'shopware_plugininstaller.account_manager_service' => 'getShopwarePlugininstaller_AccountManagerServiceService',
            'shopware_plugininstaller.plugin_download_service' => 'getShopwarePlugininstaller_PluginDownloadServiceService',
            'shopware_plugininstaller.plugin_installer_struct_hydrator' => 'getShopwarePlugininstaller_PluginInstallerStructHydratorService',
            'shopware_plugininstaller.plugin_licence_service' => 'getShopwarePlugininstaller_PluginLicenceServiceService',
            'shopware_plugininstaller.plugin_manager' => 'getShopwarePlugininstaller_PluginManagerService',
            'shopware_plugininstaller.plugin_service_local' => 'getShopwarePlugininstaller_PluginServiceLocalService',
            'shopware_plugininstaller.plugin_service_store_production' => 'getShopwarePlugininstaller_PluginServiceStoreProductionService',
            'shopware_plugininstaller.plugin_service_view' => 'getShopwarePlugininstaller_PluginServiceViewService',
            'shopware_plugininstaller.store_client' => 'getShopwarePlugininstaller_StoreClientService',
            'shopware_plugininstaller.store_order_service' => 'getShopwarePlugininstaller_StoreOrderServiceService',
            'shopware_plugininstaller.subscription_service' => 'getShopwarePlugininstaller_SubscriptionServiceService',
            'shopware_product_stream.criteria_factory' => 'getShopwareProductStream_CriteriaFactoryService',
            'shopware_product_stream.facet_filter' => 'getShopwareProductStream_FacetFilterService',
            'shopware_product_stream.repository' => 'getShopwareProductStream_RepositoryService',
            'shopware_search.core_criteria_request_handler' => 'getShopwareSearch_CoreCriteriaRequestHandlerService',
            'shopware_search.product_number_search' => 'getShopwareSearch_ProductNumberSearchService',
            'shopware_search.product_search' => 'getShopwareSearch_ProductSearchService',
            'shopware_search.property_criteria_request_handler' => 'getShopwareSearch_PropertyCriteriaRequestHandlerService',
            'shopware_search.store_front_criteria_factory' => 'getShopwareSearch_StoreFrontCriteriaFactoryService',
            'shopware_searchdbal.cache_keyword_finder' => 'getShopwareSearchdbal_CacheKeywordFinderService',
            'shopware_searchdbal.category_condition_handler_dbal' => 'getShopwareSearchdbal_CategoryConditionHandlerDbalService',
            'shopware_searchdbal.category_facet_handler_dbal' => 'getShopwareSearchdbal_CategoryFacetHandlerDbalService',
            'shopware_searchdbal.create_date_condition_handler' => 'getShopwareSearchdbal_CreateDateConditionHandlerService',
            'shopware_searchdbal.customer_group_condition_handler_dbal' => 'getShopwareSearchdbal_CustomerGroupConditionHandlerDbalService',
            'shopware_searchdbal.dbal_query_builder_factory' => 'getShopwareSearchdbal_DbalQueryBuilderFactoryService',
            'shopware_searchdbal.has_price_condition_handler_dbal' => 'getShopwareSearchdbal_HasPriceConditionHandlerDbalService',
            'shopware_searchdbal.has_pseudo_price_condition_handler_dbal' => 'getShopwareSearchdbal_HasPseudoPriceConditionHandlerDbalService',
            'shopware_searchdbal.immediate_delivery_condition_handler_dbal' => 'getShopwareSearchdbal_ImmediateDeliveryConditionHandlerDbalService',
            'shopware_searchdbal.immediate_delivery_facet_handler_dbal' => 'getShopwareSearchdbal_ImmediateDeliveryFacetHandlerDbalService',
            'shopware_searchdbal.is_available_condition_handler_dbal' => 'getShopwareSearchdbal_IsAvailableConditionHandlerDbalService',
            'shopware_searchdbal.keyword_finder_dbal' => 'getShopwareSearchdbal_KeywordFinderDbalService',
            'shopware_searchdbal.manufacturer_condition_handler_dbal' => 'getShopwareSearchdbal_ManufacturerConditionHandlerDbalService',
            'shopware_searchdbal.manufacturer_facet_handler_dbal' => 'getShopwareSearchdbal_ManufacturerFacetHandlerDbalService',
            'shopware_searchdbal.ordernumber_condition_handler_dbal' => 'getShopwareSearchdbal_OrdernumberConditionHandlerDbalService',
            'shopware_searchdbal.popularity_sorting_handler_dbal' => 'getShopwareSearchdbal_PopularitySortingHandlerDbalService',
            'shopware_searchdbal.price_condition_handler_dbal' => 'getShopwareSearchdbal_PriceConditionHandlerDbalService',
            'shopware_searchdbal.price_facet_handler_dbal' => 'getShopwareSearchdbal_PriceFacetHandlerDbalService',
            'shopware_searchdbal.price_sorting_handler_sorting_handler_dbal' => 'getShopwareSearchdbal_PriceSortingHandlerSortingHandlerDbalService',
            'shopware_searchdbal.product_attribute_condition_handler_dbal' => 'getShopwareSearchdbal_ProductAttributeConditionHandlerDbalService',
            'shopware_searchdbal.product_attribute_facet_handler_dbal' => 'getShopwareSearchdbal_ProductAttributeFacetHandlerDbalService',
            'shopware_searchdbal.product_name_sorting_handler_dbal' => 'getShopwareSearchdbal_ProductNameSortingHandlerDbalService',
            'shopware_searchdbal.property_condition_handler_dbal' => 'getShopwareSearchdbal_PropertyConditionHandlerDbalService',
            'shopware_searchdbal.property_facet_handler_dbal' => 'getShopwareSearchdbal_PropertyFacetHandlerDbalService',
            'shopware_searchdbal.release_date_condition_handler' => 'getShopwareSearchdbal_ReleaseDateConditionHandlerService',
            'shopware_searchdbal.release_date_sorting_handler_dbal' => 'getShopwareSearchdbal_ReleaseDateSortingHandlerDbalService',
            'shopware_searchdbal.sales_condition_handler_dbal' => 'getShopwareSearchdbal_SalesConditionHandlerDbalService',
            'shopware_searchdbal.search_condition_handler_dbal' => 'getShopwareSearchdbal_SearchConditionHandlerDbalService',
            'shopware_searchdbal.search_indexer' => 'getShopwareSearchdbal_SearchIndexerService',
            'shopware_searchdbal.search_price_helper_dbal' => 'getShopwareSearchdbal_SearchPriceHelperDbalService',
            'shopware_searchdbal.search_query_builder_dbal' => 'getShopwareSearchdbal_SearchQueryBuilderDbalService',
            'shopware_searchdbal.search_ranking_sorting_handler_dbal' => 'getShopwareSearchdbal_SearchRankingSortingHandlerDbalService',
            'shopware_searchdbal.search_term_helper' => 'getShopwareSearchdbal_SearchTermHelperService',
            'shopware_searchdbal.search_term_logger' => 'getShopwareSearchdbal_SearchTermLoggerService',
            'shopware_searchdbal.shipping_free_condition_handler_dbal' => 'getShopwareSearchdbal_ShippingFreeConditionHandlerDbalService',
            'shopware_searchdbal.shipping_free_facet_handler_dbal' => 'getShopwareSearchdbal_ShippingFreeFacetHandlerDbalService',
            'shopware_searchdbal.shopware_searchdbal.product_attribute_sorting_handler_dbal' => 'getShopwareSearchdbal_ShopwareSearchdbal_ProductAttributeSortingHandlerDbalService',
            'shopware_searchdbal.vote_average_condition_handler_dbal' => 'getShopwareSearchdbal_VoteAverageConditionHandlerDbalService',
            'shopware_searchdbal.vote_average_facet_handler_dbal' => 'getShopwareSearchdbal_VoteAverageFacetHandlerDbalService',
            'shopware_storefront.additional_text_service' => 'getShopwareStorefront_AdditionalTextServiceService',
            'shopware_storefront.attribute_hydrator_dbal' => 'getShopwareStorefront_AttributeHydratorDbalService',
            'shopware_storefront.base_product_factory' => 'getShopwareStorefront_BaseProductFactoryService',
            'shopware_storefront.category_gateway' => 'getShopwareStorefront_CategoryGatewayService',
            'shopware_storefront.category_hydrator_dbal' => 'getShopwareStorefront_CategoryHydratorDbalService',
            'shopware_storefront.category_service' => 'getShopwareStorefront_CategoryServiceService',
            'shopware_storefront.cheapest_price_gateway' => 'getShopwareStorefront_CheapestPriceGatewayService',
            'shopware_storefront.cheapest_price_service' => 'getShopwareStorefront_CheapestPriceServiceService',
            'shopware_storefront.configurator_gateway' => 'getShopwareStorefront_ConfiguratorGatewayService',
            'shopware_storefront.configurator_hydrator_dbal' => 'getShopwareStorefront_ConfiguratorHydratorDbalService',
            'shopware_storefront.configurator_service' => 'getShopwareStorefront_ConfiguratorServiceService',
            'shopware_storefront.context_service' => 'getShopwareStorefront_ContextServiceService',
            'shopware_storefront.country_gateway' => 'getShopwareStorefront_CountryGatewayService',
            'shopware_storefront.country_hydrator_dbal' => 'getShopwareStorefront_CountryHydratorDbalService',
            'shopware_storefront.currency_gateway_dbal' => 'getShopwareStorefront_CurrencyGatewayDbalService',
            'shopware_storefront.currency_hydrator_dbal' => 'getShopwareStorefront_CurrencyHydratorDbalService',
            'shopware_storefront.customer_group_gateway' => 'getShopwareStorefront_CustomerGroupGatewayService',
            'shopware_storefront.customer_group_hydrator_dbal' => 'getShopwareStorefront_CustomerGroupHydratorDbalService',
            'shopware_storefront.download_gateway' => 'getShopwareStorefront_DownloadGatewayService',
            'shopware_storefront.download_hydrator_dbal' => 'getShopwareStorefront_DownloadHydratorDbalService',
            'shopware_storefront.esd_hydrator_dbal' => 'getShopwareStorefront_EsdHydratorDbalService',
            'shopware_storefront.field_helper_dbal' => 'getShopwareStorefront_FieldHelperDbalService',
            'shopware_storefront.graduated_prices_gateway' => 'getShopwareStorefront_GraduatedPricesGatewayService',
            'shopware_storefront.graduated_prices_service' => 'getShopwareStorefront_GraduatedPricesServiceService',
            'shopware_storefront.link_gateway' => 'getShopwareStorefront_LinkGatewayService',
            'shopware_storefront.link_hydrator_dbal' => 'getShopwareStorefront_LinkHydratorDbalService',
            'shopware_storefront.list_product_gateway' => 'getShopwareStorefront_ListProductGatewayService',
            'shopware_storefront.list_product_service' => 'getShopwareStorefront_ListProductServiceService',
            'shopware_storefront.locale_hydrator_dbal' => 'getShopwareStorefront_LocaleHydratorDbalService',
            'shopware_storefront.manufacturer_gateway' => 'getShopwareStorefront_ManufacturerGatewayService',
            'shopware_storefront.manufacturer_hydrator_dbal' => 'getShopwareStorefront_ManufacturerHydratorDbalService',
            'shopware_storefront.manufacturer_service' => 'getShopwareStorefront_ManufacturerServiceService',
            'shopware_storefront.marketing_service' => 'getShopwareStorefront_MarketingServiceService',
            'shopware_storefront.media_gateway' => 'getShopwareStorefront_MediaGatewayService',
            'shopware_storefront.media_hydrator_dbal' => 'getShopwareStorefront_MediaHydratorDbalService',
            'shopware_storefront.media_service' => 'getShopwareStorefront_MediaServiceService',
            'shopware_storefront.price_calculation_service' => 'getShopwareStorefront_PriceCalculationServiceService',
            'shopware_storefront.price_group_discount_gateway' => 'getShopwareStorefront_PriceGroupDiscountGatewayService',
            'shopware_storefront.price_hydrator_dbal' => 'getShopwareStorefront_PriceHydratorDbalService',
            'shopware_storefront.product_configuration_gateway' => 'getShopwareStorefront_ProductConfigurationGatewayService',
            'shopware_storefront.product_download_service' => 'getShopwareStorefront_ProductDownloadServiceService',
            'shopware_storefront.product_hydrator_dbal' => 'getShopwareStorefront_ProductHydratorDbalService',
            'shopware_storefront.product_link_service' => 'getShopwareStorefront_ProductLinkServiceService',
            'shopware_storefront.product_media_gateway' => 'getShopwareStorefront_ProductMediaGatewayService',
            'shopware_storefront.product_number_service' => 'getShopwareStorefront_ProductNumberServiceService',
            'shopware_storefront.product_property_gateway' => 'getShopwareStorefront_ProductPropertyGatewayService',
            'shopware_storefront.product_service' => 'getShopwareStorefront_ProductServiceService',
            'shopware_storefront.product_stream_hydrator_dbal' => 'getShopwareStorefront_ProductStreamHydratorDbalService',
            'shopware_storefront.property_gateway' => 'getShopwareStorefront_PropertyGatewayService',
            'shopware_storefront.property_hydrator_dbal' => 'getShopwareStorefront_PropertyHydratorDbalService',
            'shopware_storefront.property_service' => 'getShopwareStorefront_PropertyServiceService',
            'shopware_storefront.related_product_streams_gateway' => 'getShopwareStorefront_RelatedProductStreamsGatewayService',
            'shopware_storefront.related_product_streams_service' => 'getShopwareStorefront_RelatedProductStreamsServiceService',
            'shopware_storefront.related_products_gateway' => 'getShopwareStorefront_RelatedProductsGatewayService',
            'shopware_storefront.related_products_service' => 'getShopwareStorefront_RelatedProductsServiceService',
            'shopware_storefront.shop_gateway_dbal' => 'getShopwareStorefront_ShopGatewayDbalService',
            'shopware_storefront.shop_hydrator_dbal' => 'getShopwareStorefront_ShopHydratorDbalService',
            'shopware_storefront.similar_products_gateway' => 'getShopwareStorefront_SimilarProductsGatewayService',
            'shopware_storefront.similar_products_service' => 'getShopwareStorefront_SimilarProductsServiceService',
            'shopware_storefront.storefront_cache' => 'getShopwareStorefront_StorefrontCacheService',
            'shopware_storefront.tax_gateway' => 'getShopwareStorefront_TaxGatewayService',
            'shopware_storefront.tax_hydrator_dbal' => 'getShopwareStorefront_TaxHydratorDbalService',
            'shopware_storefront.template_hydrator_dbal' => 'getShopwareStorefront_TemplateHydratorDbalService',
            'shopware_storefront.unit_hydrator_dbal' => 'getShopwareStorefront_UnitHydratorDbalService',
            'shopware_storefront.variant_media_gateway' => 'getShopwareStorefront_VariantMediaGatewayService',
            'shopware_storefront.vote_average_gateway' => 'getShopwareStorefront_VoteAverageGatewayService',
            'shopware_storefront.vote_gateway' => 'getShopwareStorefront_VoteGatewayService',
            'shopware_storefront.vote_hydrator_dbal' => 'getShopwareStorefront_VoteHydratorDbalService',
            'shopware_storefront.vote_service' => 'getShopwareStorefront_VoteServiceService',
            'sitemapxml.repository' => 'getSitemapxml_RepositoryService',
            'snippets' => 'getSnippetsService',
            'template' => 'getTemplateService',
            'template_factory' => 'getTemplateFactoryService',
            'templatemail' => 'getTemplatemailService',
            'templatemail_factory' => 'getTemplatemailFactoryService',
            'theme_backend_registration' => 'getThemeBackendRegistrationService',
            'theme_compiler' => 'getThemeCompilerService',
            'theme_config_loader' => 'getThemeConfigLoaderService',
            'theme_config_persister' => 'getThemeConfigPersisterService',
            'theme_configurator' => 'getThemeConfiguratorService',
            'theme_generator' => 'getThemeGeneratorService',
            'theme_inheritance' => 'getThemeInheritanceService',
            'theme_installer' => 'getThemeInstallerService',
            'theme_path_resolver' => 'getThemePathResolverService',
            'theme_service' => 'getThemeServiceService',
            'theme_util' => 'getThemeUtilService',
            'thumbnail_generator_basic' => 'getThumbnailGeneratorBasicService',
            'thumbnail_manager' => 'getThumbnailManagerService',
            'validator.email' => 'getValidator_EmailService',
        );
        $this->aliases = array(
            'less_compiler' => 'oyejorge_compiler',
            'plugin_manager' => 'plugins',
            'shopware.db' => 'db',
            'shopware.event_manager' => 'events',
            'shopware.hook_manager' => 'hooks',
            'shopware.loader' => 'loader',
            'shopware.locale' => 'locale',
            'shopware.mail_transport' => 'mailtransport',
            'shopware.model_annotations' => 'modelannotations',
            'shopware.model_config' => 'modelconfig',
            'shopware.model_manager' => 'models',
            'shopware.plugin_manager' => 'shopware_plugininstaller.plugin_manager',
            'shopware_plugininstaller.plugin_service_store' => 'shopware_plugininstaller.plugin_service_store_production',
        );
    }
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }
    protected function getAclService()
    {
        return $this->services['acl'] = new \Shopware_Components_Acl($this->get('models'));
    }
    protected function getApplicationService()
    {
        throw new RuntimeException('You have requested a synthetic service ("application"). The DIC does not know how to construct this service.');
    }
    protected function getBootstrapService()
    {
        throw new RuntimeException('You have requested a synthetic service ("bootstrap"). The DIC does not know how to construct this service.');
    }
    protected function getCacheService()
    {
        return $this->services['cache'] = $this->get('cache_factory')->factory('auto', array('automatic_serialization' => true, 'automatic_cleaning_factor' => 0, 'lifetime' => 3600, 'cache_id_prefix' => '4ab5bb1467dda5a4a01a404f337a6454'), array('hashed_directory_perm' => 505, 'cache_file_perm' => 420, 'hashed_directory_level' => 3, 'cache_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/general', 'file_name_prefix' => 'shopware'));
    }
    protected function getCacheFactoryService()
    {
        return $this->services['cache_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Cache();
    }
    protected function getCategorydenormalizationService()
    {
        return $this->services['categorydenormalization'] = new \Shopware\Components\Model\CategoryDenormalization($this->get('db_connection'));
    }
    protected function getCategoryduplicatorService()
    {
        return $this->services['categoryduplicator'] = new \Shopware\Components\CategoryHandling\CategoryDuplicator($this->get('db_connection'), $this->get('categorydenormalization'));
    }
    protected function getCategorysubscriberService()
    {
        return $this->services['categorysubscriber'] = new \Shopware\Components\Model\CategorySubscriber($this->get('categorydenormalization'));
    }
    protected function getConfigService()
    {
        return $this->services['config'] = $this->get('config_factory')->factory($this->get('cache'), $this->get('db', ContainerInterface::NULL_ON_INVALID_REFERENCE), array());
    }
    protected function getConfigFactoryService()
    {
        return $this->services['config_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Config();
    }
    protected function getConfigWriterService()
    {
        return $this->services['config_writer'] = new \Shopware\Components\ConfigWriter($this->get('dbal_connection'));
    }
    protected function getCoreloggerService()
    {
        $this->services['corelogger'] = $instance = new \Shopware\Components\Logger('core');
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getCronService()
    {
        return $this->services['cron'] = new \Enlight_Components_Cron_Manager($this->get('cron_adapter'), $this->get('events'), 'Shopware_Components_Cron_CronJob');
    }
    protected function getCronAdapterService()
    {
        return $this->services['cron_adapter'] = new \Enlight_Components_Cron_Adapter_DBAL($this->get('dbal_connection'));
    }
    protected function getCurrencyService()
    {
        return $this->services['currency'] = $this->get('currency_factory')->factory($this, $this->get('locale'));
    }
    protected function getCurrencyFactoryService()
    {
        return $this->services['currency_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Currency();
    }
    protected function getDateService()
    {
        return $this->services['date'] = new \Zend_Date($this->get('locale'));
    }
    protected function getDbService()
    {
        return $this->services['db'] = $this->get('db_factory')->factory('pdo_mysql', array('username' => 'shopware', 'password' => 'goucher', 'dbname' => 'shopware', 'host' => 'localhost', 'charset' => 'utf8', 'adapter' => 'pdo_mysql', 'port' => '3306'));
    }
    protected function getDbConnectionService()
    {
        return $this->services['db_connection'] = $this->get('db')->getConnection();
    }
    protected function getDbFactoryService()
    {
        return $this->services['db_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Db();
    }
    protected function getDbalConnectionService()
    {
        return $this->services['dbal_connection'] = $this->get('models')->getConnection();
    }
    protected function getDebugloggerService()
    {
        return $this->services['debuglogger'] = new \Shopware\Components\Logger('debug');
    }
    protected function getDispatcherService()
    {
        return $this->services['dispatcher'] = new \Enlight_Controller_Dispatcher_Default();
    }
    protected function getEmotionDeviceConfigurationService()
    {
        return $this->services['emotion_device_configuration'] = new \Shopware\Components\Emotion\DeviceConfiguration($this->get('dbal_connection'));
    }
    protected function getEventsService()
    {
        $this->services['events'] = $instance = new \Enlight_Event_EventManager();
        $instance->addListener('Enlight_Controller_Front_RouteShutdown', array(0 => $this->get('theme_backend_registration'), 1 => 'registerBackendTheme'));
        $instance->addListener('Enlight_Controller_Front_RouteStartup', array(0 => $this->get('monolog.handler.chromephp'), 1 => 'onRouteStartUp'));
        $instance->addListener('Enlight_Controller_Front_RouteStartup', array(0 => $this->get('monolog.handler.firephp'), 1 => 'onRouteStartUp'));
        $instance->addSubscriber($this->get('legacy_listing_converter'));
        $instance->addSubscriber($this->get('legacy_search_converter'));
        $instance->addSubscriber(new \Shopware\Components\AttributeSubscriber($this));
        $instance->addSubscriber($this->get('theme_config_loader'));
        $instance->addSubscriber($this->get('shopware_elastic_search.service_subscriber'));
        $instance->addSubscriber(new \Shopware\Bundle\ESIndexingBundle\Subscriber\DomainBacklogSubscriber($this));
        $instance->addSubscriber($this->get('shopware_media.service_subscriber'));
        return $instance;
    }
    protected function getFileSystemService()
    {
        return $this->services['file_system'] = new \Symfony\Component\Filesystem\Filesystem();
    }
    protected function getFirstRunWizardPluginStoreService()
    {
        return $this->services['first_run_wizard_plugin_store'] = new \Shopware\Bundle\PluginInstallerBundle\Service\FirstRunWizardPluginStoreService($this->get('shopware_plugininstaller.plugin_installer_struct_hydrator'), $this->get('shopware_plugininstaller.plugin_service_local'), $this->get('shopware_plugininstaller.store_client'));
    }
    protected function getFrontService()
    {
        return $this->services['front'] = $this->get('front_factory')->factory($this, $this->get('bootstrap'), $this->get('events'), array('noErrorHandler' => false, 'throwExceptions' => false, 'disableOutputBuffering' => false, 'showException' => false, 'charset' => 'utf-8'));
    }
    protected function getFrontFactoryService()
    {
        return $this->services['front_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Front();
    }
    protected function getGuzzleHttpClientFactoryService()
    {
        return $this->services['guzzle_http_client_factory'] = new \Shopware\Components\HttpClient\GuzzleFactory();
    }
    protected function getHooksService()
    {
        return $this->services['hooks'] = new \Enlight_Hook_HookManager($this->get('events'), $this->get('loader'), array('proxyDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/proxies', 'proxyNamespace' => 'Shopware_Proxies'));
    }
    protected function getHttpCacheWarmerService()
    {
        return $this->services['http_cache_warmer'] = new \Shopware\Components\HttpCache\CacheWarmer($this->get('dbal_connection'), $this->get('corelogger'), $this->get('guzzle_http_client_factory'));
    }
    protected function getHttpClientService()
    {
        return $this->services['http_client'] = new \Shopware\Components\HttpClient\GuzzleHttpClient($this->get('guzzle_http_client_factory'));
    }
    protected function getJsCompressorService()
    {
        return $this->services['js_compressor'] = new \Shopware\Components\Theme\Compressor\Js();
    }
    protected function getLegacyEventManagerService()
    {
        return $this->services['legacy_event_manager'] = new \Shopware\Components\Compatibility\LegacyEventManager($this->get('events'), $this->get('config'), $this->get('shopware_storefront.context_service'));
    }
    protected function getLegacyListingConverterService()
    {
        return $this->services['legacy_listing_converter'] = new \Shopware\Components\Compatibility\LegacyListingSubscriber($this);
    }
    protected function getLegacySearchConverterService()
    {
        return $this->services['legacy_search_converter'] = new \Shopware\Components\Compatibility\LegacySearchSubscriber($this);
    }
    protected function getLegacyStructConverterService()
    {
        return $this->services['legacy_struct_converter'] = new \Shopware\Components\Compatibility\LegacyStructConverter($this->get('config'), $this->get('shopware_storefront.context_service'), $this->get('events'), $this->get('shopware_media.media_service'));
    }
    protected function getLoaderService()
    {
        return $this->services['loader'] = new \Enlight_Loader();
    }
    protected function getLocaleService()
    {
        return $this->services['locale'] = $this->get('locale_factory')->factory($this);
    }
    protected function getLocaleFactoryService()
    {
        return $this->services['locale_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Locale();
    }
    protected function getMailService()
    {
        return $this->services['mail'] = $this->get('mail_factory')->factory($this, $this->get('config'), array('charset' => 'utf-8'));
    }
    protected function getMailFactoryService()
    {
        return $this->services['mail_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Mail();
    }
    protected function getMailtransportService()
    {
        return $this->services['mailtransport'] = $this->get('mailtransport_factory')->factory($this->get('loader'), $this->get('config'), array('charset' => 'utf-8'));
    }
    protected function getMailtransportFactoryService()
    {
        return $this->services['mailtransport_factory'] = new \Shopware\Components\DependencyInjection\Bridge\MailTransport();
    }
    protected function getModelAnnotationsFactoryService()
    {
        return $this->services['model_annotations_factory'] = new \Shopware\Components\DependencyInjection\Bridge\ModelAnnotation();
    }
    protected function getModelFactoryService()
    {
        return $this->services['model_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Models();
    }
    protected function getModelannotationsService()
    {
        return $this->services['modelannotations'] = $this->get('model_annotations_factory')->factory($this->get('modelconfig'), 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/engine/Shopware/Models');
    }
    protected function getModelconfigService()
    {
        return $this->services['modelconfig'] = new \Shopware\Components\Model\Configuration(array('autoGenerateProxyClasses' => false, 'fileCacheDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/filecache', 'attributeDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/attributes', 'proxyDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/proxies', 'proxyNamespace' => 'Shopware\\Proxies', 'cacheProvider' => 'auto', 'cacheNamespace' => NULL), $this->get('cache'), $this->get('hooks'));
    }
    protected function getModelsService()
    {
        $a = new \Doctrine\Common\EventManager();
        $a->addEventSubscriber(new \Shopware\Components\Model\EventSubscriber($this->get('events')));
        $a->addEventSubscriber(new \Shopware\Models\Order\OrderHistorySubscriber());
        $a->addEventSubscriber($this->get('categorysubscriber'));
        $a->addEventSubscriber(new \Shopware\Models\Media\MediaSubscriber($this));
        $a->addEventSubscriber(new \Shopware\Bundle\ESIndexingBundle\Subscriber\ORMBacklogSubscriber($this));
        return $this->services['models'] = $this->get('model_factory')->factory($a, $this->get('modelconfig'), $this->get('loader'), $this->get('db_connection'), 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware', $this->get('modelannotations'));
    }
    protected function getModelsMetadataCacheService()
    {
        return $this->services['models_metadata_cache'] = $this->get('modelconfig')->getMetadataCacheImpl();
    }
    protected function getMonolog_Formatter_WildfireService()
    {
        return $this->services['monolog.formatter.wildfire'] = new \Shopware\Components\Log\Formatter\WildfireFormatter();
    }
    protected function getMonolog_Handler_ChromephpService()
    {
        return $this->services['monolog.handler.chromephp'] = new \Shopware\Components\Log\Handler\ChromePhpHandler();
    }
    protected function getMonolog_Handler_FirephpService()
    {
        $this->services['monolog.handler.firephp'] = $instance = new \Shopware\Components\Log\Handler\FirePHPHandler();
        $instance->setFormatter($this->get('monolog.formatter.wildfire'));
        return $instance;
    }
    protected function getMonolog_Handler_MainService()
    {
        $a = new \Monolog\Handler\RotatingFileHandler('C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/log/core_production.log', 14);
        $a->pushProcessor($this->get('monolog.processor.uid'));
        return $this->services['monolog.handler.main'] = new \Monolog\Handler\FingersCrossedHandler($a, 400);
    }
    protected function getMultiEdit_ProductService()
    {
        return $this->services['multi_edit.product'] = new \Shopware\Components\MultiEdit\Resource\Product($this->get('multi_edit.product.dql_helper'), $this->get('multi_edit.product.grammar'), $this->get('multi_edit.product.value'), $this->get('multi_edit.product.filter'), $this->get('multi_edit.product.batch_process'), $this->get('multi_edit.product.queue'), $this->get('multi_edit.product.backup'));
    }
    protected function getMultiEdit_Product_BackupService()
    {
        return $this->services['multi_edit.product.backup'] = new \Shopware\Components\MultiEdit\Resource\Product\Backup($this->get('multi_edit.product.dql_helper'), $this->get('config'));
    }
    protected function getMultiEdit_Product_BatchProcessService()
    {
        return $this->services['multi_edit.product.batch_process'] = new \Shopware\Components\MultiEdit\Resource\Product\BatchProcess($this->get('multi_edit.product.dql_helper'), $this->get('multi_edit.product.filter'), $this->get('multi_edit.product.queue'), $this->get('config'));
    }
    protected function getMultiEdit_Product_DqlHelperService()
    {
        return $this->services['multi_edit.product.dql_helper'] = new \Shopware\Components\MultiEdit\Resource\Product\DqlHelper($this->get('db'), $this->get('models'), $this->get('events'));
    }
    protected function getMultiEdit_Product_FilterService()
    {
        return $this->services['multi_edit.product.filter'] = new \Shopware\Components\MultiEdit\Resource\Product\Filter($this->get('multi_edit.product.dql_helper'));
    }
    protected function getMultiEdit_Product_GrammarService()
    {
        return $this->services['multi_edit.product.grammar'] = new \Shopware\Components\MultiEdit\Resource\Product\Grammar($this->get('multi_edit.product.dql_helper'), $this->get('events'));
    }
    protected function getMultiEdit_Product_QueueService()
    {
        return $this->services['multi_edit.product.queue'] = new \Shopware\Components\MultiEdit\Resource\Product\Queue($this->get('multi_edit.product.dql_helper'), $this->get('multi_edit.product.filter'), $this->get('multi_edit.product.backup'));
    }
    protected function getMultiEdit_Product_ValueService()
    {
        return $this->services['multi_edit.product.value'] = new \Shopware\Components\MultiEdit\Resource\Product\Value($this->get('multi_edit.product.dql_helper'));
    }
    protected function getOyejorgeCompilerService()
    {
        return $this->services['oyejorge_compiler'] = new \Shopware\Components\Theme\LessCompiler\Oyejorge($this->get('oyejorge_compiler_lib'));
    }
    protected function getOyejorgeCompilerLibService()
    {
        return $this->services['oyejorge_compiler_lib'] = new \Less_Parser();
    }
    protected function getPluginloggerService()
    {
        $a = new \Monolog\Handler\RotatingFileHandler('C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/log/plugin_production.log', 14);
        $a->pushProcessor($this->get('monolog.processor.uid'));
        $this->services['pluginlogger'] = $instance = new \Shopware\Components\Logger('plugin');
        $instance->pushHandler($a);
        return $instance;
    }
    protected function getPluginsService()
    {
        return $this->services['plugins'] = $this->get('plugins_factory')->factory($this, $this->get('loader'), $this->get('events'), $this->get('application'), array());
    }
    protected function getPluginsFactoryService()
    {
        return $this->services['plugins_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Plugins();
    }
    protected function getQueryAliasMapperService()
    {
        return $this->services['query_alias_mapper'] = \Shopware\Components\QueryAliasMapper::createFromConfig($this->get('config'));
    }
    protected function getRouterService()
    {
        return $this->services['router'] = $this->get('router_factory')->factory($this, $this->get('events'));
    }
    protected function getRouterFactoryService()
    {
        return $this->services['router_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Router();
    }
    protected function getSessionService()
    {
        return $this->services['session'] = $this->get('session_factory')->factory($this);
    }
    protected function getSessionFactoryService()
    {
        return $this->services['session_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Session();
    }
    protected function getShopPageMenuService()
    {
        return $this->services['shop_page_menu'] = new \Shopware\Components\SitePageMenu($this->get('dbal_connection'));
    }
    protected function getShopware_CacheManagerService()
    {
        return $this->services['shopware.cache_manager'] = new \Shopware\Components\CacheManager($this);
    }
    protected function getShopware_EscaperService()
    {
        return $this->services['shopware.escaper'] = new \Shopware\Components\Escaper\Escaper(new \Zend\Escaper\Escaper('utf-8'));
    }
    protected function getShopware_HolidayTableUpdaterService()
    {
        return $this->services['shopware.holiday_table_updater'] = new \Shopware\Components\HolidayTableUpdater($this->get('dbal_connection'));
    }
    protected function getShopware_SnippetDatabaseHandlerService()
    {
        return $this->services['shopware.snippet_database_handler'] = new \Shopware\Components\Snippet\DatabaseHandler($this->get('models'), $this->get('db'), 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware');
    }
    protected function getShopware_SnippetQueryHandlerService()
    {
        return $this->services['shopware.snippet_query_handler'] = new \Shopware\Components\Snippet\QueryHandler('C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/snippets/');
    }
    protected function getShopware_SnippetValidatorService()
    {
        return $this->services['shopware.snippet_validator'] = new \Shopware\Components\Snippet\SnippetValidator($this->get('dbal_connection'));
    }
    protected function getShopwareElasticSearch_BacklogProcessorService()
    {
        return $this->services['shopware_elastic_search.backlog_processor'] = new \Shopware\Bundle\ESIndexingBundle\BacklogProcessor($this->get('dbal_connection'), $this->get('shopware_elastic_search.composite_synchronizer'), $this->get('shopware_elastic_search.index_factory'), $this->get('shopware_elastic_search.identifier_selector'));
    }
    protected function getShopwareElasticSearch_BacklogReaderService()
    {
        return $this->services['shopware_elastic_search.backlog_reader'] = new \Shopware\Bundle\ESIndexingBundle\BacklogReader($this->get('dbal_connection'));
    }
    protected function getShopwareElasticSearch_ClientService()
    {
        return $this->services['shopware_elastic_search.client'] = \Shopware\Bundle\ESIndexingBundle\ClientFactory::createClient(array('hosts' => array(0 => 'localhost:9200')));
    }
    protected function getShopwareElasticSearch_CompositeSynchronizerService()
    {
        return $this->services['shopware_elastic_search.composite_synchronizer'] = $this->get('shopware_elastic_search.composite_synchronizer_factory')->factory($this);
    }
    protected function getShopwareElasticSearch_CompositeSynchronizerFactoryService()
    {
        return $this->services['shopware_elastic_search.composite_synchronizer_factory'] = new \Shopware\Bundle\ESIndexingBundle\DependencyInjection\Factory\CompositeSynchronizerFactory(array(0 => $this->get('shopware_elastic_search.property_synchronizer'), 1 => $this->get('shopware_elastic_search.product_synchronizer')));
    }
    protected function getShopwareElasticSearch_FieldMappingService()
    {
        return $this->services['shopware_elastic_search.field_mapping'] = new \Shopware\Bundle\ESIndexingBundle\FieldMapping($this->get('shopware_elastic_search.shop_analyzer'));
    }
    protected function getShopwareElasticSearch_IdentifierSelectorService()
    {
        return $this->services['shopware_elastic_search.identifier_selector'] = new \Shopware\Bundle\ESIndexingBundle\IdentifierSelector($this->get('dbal_connection'), $this->get('shopware_storefront.shop_gateway_dbal'));
    }
    protected function getShopwareElasticSearch_IndexFactoryService()
    {
        return $this->services['shopware_elastic_search.index_factory'] = new \Shopware\Bundle\ESIndexingBundle\IndexFactory('sw_shop');
    }
    protected function getShopwareElasticSearch_ProductIndexerService()
    {
        return $this->services['shopware_elastic_search.product_indexer'] = new \Shopware\Bundle\ESIndexingBundle\Product\ProductIndexer($this->get('shopware_elastic_search.client'), $this->get('shopware_elastic_search.product_provider'), $this->get('shopware_elastic_search.product_query_factory'));
    }
    protected function getShopwareElasticSearch_ProductMappingService()
    {
        return $this->services['shopware_elastic_search.product_mapping'] = new \Shopware\Bundle\ESIndexingBundle\Product\ProductMapping($this->get('shopware_elastic_search.identifier_selector'), $this->get('shopware_elastic_search.field_mapping'));
    }
    protected function getShopwareElasticSearch_ProductProviderService()
    {
        return $this->services['shopware_elastic_search.product_provider'] = new \Shopware\Bundle\ESIndexingBundle\Product\ProductProvider($this->get('shopware_storefront.list_product_gateway'), $this->get('shopware_storefront.cheapest_price_service'), $this->get('shopware_storefront.vote_service'), $this->get('shopware_storefront.context_service'), $this->get('dbal_connection'), $this->get('shopware_elastic_search.identifier_selector'), $this->get('shopware_storefront.price_calculation_service'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.property_hydrator_dbal'));
    }
    protected function getShopwareElasticSearch_ProductQueryFactoryService()
    {
        return $this->services['shopware_elastic_search.product_query_factory'] = new \Shopware\Bundle\ESIndexingBundle\Product\ProductQueryFactory($this->get('dbal_connection'));
    }
    protected function getShopwareElasticSearch_ProductSynchronizerService()
    {
        return $this->services['shopware_elastic_search.product_synchronizer'] = new \Shopware\Bundle\ESIndexingBundle\Product\ProductSynchronizer($this->get('shopware_elastic_search.product_query_factory'), $this->get('shopware_elastic_search.product_indexer'));
    }
    protected function getShopwareElasticSearch_PropertyIndexerService()
    {
        return $this->services['shopware_elastic_search.property_indexer'] = new \Shopware\Bundle\ESIndexingBundle\Property\PropertyIndexer($this->get('shopware_elastic_search.client'), $this->get('shopware_elastic_search.property_query_factory'), $this->get('shopware_elastic_search.property_provider'));
    }
    protected function getShopwareElasticSearch_PropertyMappingService()
    {
        return $this->services['shopware_elastic_search.property_mapping'] = new \Shopware\Bundle\ESIndexingBundle\Property\PropertyMapping($this->get('shopware_elastic_search.field_mapping'));
    }
    protected function getShopwareElasticSearch_PropertyProviderService()
    {
        return $this->services['shopware_elastic_search.property_provider'] = new \Shopware\Bundle\ESIndexingBundle\Property\PropertyProvider($this->get('dbal_connection'), $this->get('shopware_storefront.context_service'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.property_hydrator_dbal'));
    }
    protected function getShopwareElasticSearch_PropertyQueryFactoryService()
    {
        return $this->services['shopware_elastic_search.property_query_factory'] = new \Shopware\Bundle\ESIndexingBundle\Property\PropertyQueryFactory($this->get('dbal_connection'));
    }
    protected function getShopwareElasticSearch_PropertySynchronizerService()
    {
        return $this->services['shopware_elastic_search.property_synchronizer'] = new \Shopware\Bundle\ESIndexingBundle\Property\PropertySynchronizer($this->get('shopware_elastic_search.property_indexer'));
    }
    protected function getShopwareElasticSearch_ServiceSubscriberService()
    {
        return $this->services['shopware_elastic_search.service_subscriber'] = new \Shopware\Bundle\ESIndexingBundle\Subscriber\ServiceSubscriber();
    }
    protected function getShopwareElasticSearch_ShopAnalyzerService()
    {
        return $this->services['shopware_elastic_search.shop_analyzer'] = new \Shopware\Bundle\ESIndexingBundle\ShopAnalyzer();
    }
    protected function getShopwareElasticSearch_ShopIndexerService()
    {
        return $this->services['shopware_elastic_search.shop_indexer'] = $this->get('shopware_elastic_search.shop_indexer_factory')->factory($this);
    }
    protected function getShopwareElasticSearch_ShopIndexerFactoryService()
    {
        return $this->services['shopware_elastic_search.shop_indexer_factory'] = new \Shopware\Bundle\ESIndexingBundle\DependencyInjection\Factory\ShopIndexerFactory(array(0 => $this->get('shopware_elastic_search.property_indexer'), 1 => $this->get('shopware_elastic_search.product_indexer')), array(0 => $this->get('shopware_elastic_search.property_mapping'), 1 => $this->get('shopware_elastic_search.product_mapping')), array());
    }
    protected function getShopwareMedia_GarbageCollectorService()
    {
        return $this->services['shopware_media.garbage_collector'] = $this->get('shopware_media.garbage_collector_factory')->factory();
    }
    protected function getShopwareMedia_GarbageCollectorFactoryService()
    {
        return $this->services['shopware_media.garbage_collector_factory'] = new \Shopware\Bundle\MediaBundle\GarbageCollectorFactory($this->get('events'), $this->get('dbal_connection'), $this->get('shopware_media.media_service'));
    }
    protected function getShopwareMedia_MediaMigrationService()
    {
        return $this->services['shopware_media.media_migration'] = new \Shopware\Bundle\MediaBundle\MediaMigration();
    }
    protected function getShopwareMedia_MediaServiceService()
    {
        return $this->services['shopware_media.media_service'] = $this->get('shopware_media.media_service_factory')->factory('local');
    }
    protected function getShopwareMedia_MediaServiceFactoryService()
    {
        return $this->services['shopware_media.media_service_factory'] = new \Shopware\Bundle\MediaBundle\MediaServiceFactory($this, array('backend' => 'local', 'strategy' => 'md5', 'adapters' => array('local' => array('type' => 'local', 'mediaUrl' => '', 'path' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware'), 'ftp' => array('type' => 'ftp', 'mediaUrl' => '', 'host' => '', 'username' => '', 'password' => '', 'port' => 21, 'root' => '/', 'passive' => true, 'ssl' => false, 'timeout' => 30))));
    }
    protected function getShopwareMedia_ServiceSubscriberService()
    {
        return $this->services['shopware_media.service_subscriber'] = new \Shopware\Bundle\MediaBundle\Subscriber\ServiceSubscriber($this);
    }
    protected function getShopwareMedia_StrategyService()
    {
        return $this->services['shopware_media.strategy'] = $this->get('shopware_media.strategy_factory')->factory('md5');
    }
    protected function getShopwareMedia_StrategyFactoryService()
    {
        return $this->services['shopware_media.strategy_factory'] = new \Shopware\Bundle\MediaBundle\Strategy\StrategyFactory(array('backend' => 'local', 'strategy' => 'md5', 'adapters' => array('local' => array('type' => 'local', 'mediaUrl' => '', 'path' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware'), 'ftp' => array('type' => 'ftp', 'mediaUrl' => '', 'host' => '', 'username' => '', 'password' => '', 'port' => 21, 'root' => '/', 'passive' => true, 'ssl' => false, 'timeout' => 30))));
    }
    protected function getShopwarePlugininstaller_AccountManagerServiceService()
    {
        return $this->services['shopware_plugininstaller.account_manager_service'] = new \Shopware\Bundle\PluginInstallerBundle\Service\AccountManagerService($this->get('shopware_plugininstaller.store_client'), $this->get('shopware_plugininstaller.plugin_installer_struct_hydrator'), $this->get('snippets'), $this->get('models'), $this->get('guzzle_http_client_factory'), 'https://api.shopware.com');
    }
    protected function getShopwarePlugininstaller_PluginDownloadServiceService()
    {
        return $this->services['shopware_plugininstaller.plugin_download_service'] = new \Shopware\Bundle\PluginInstallerBundle\Service\DownloadService('C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware', $this->get('shopware_plugininstaller.store_client'), $this->get('dbal_connection'));
    }
    protected function getShopwarePlugininstaller_PluginInstallerStructHydratorService()
    {
        return $this->services['shopware_plugininstaller.plugin_installer_struct_hydrator'] = new \Shopware\Bundle\PluginInstallerBundle\Struct\StructHydrator();
    }
    protected function getShopwarePlugininstaller_PluginLicenceServiceService()
    {
        return $this->services['shopware_plugininstaller.plugin_licence_service'] = new \Shopware\Bundle\PluginInstallerBundle\Service\PluginLicenceService($this->get('dbal_connection'), $this->get('shopware_plugininstaller.plugin_manager'), $this->get('shopware_plugininstaller.store_client'));
    }
    protected function getShopwarePlugininstaller_PluginManagerService()
    {
        return $this->services['shopware_plugininstaller.plugin_manager'] = new \Shopware\Bundle\PluginInstallerBundle\Service\InstallerService($this->get('models'), $this->get('plugins'), 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware');
    }
    protected function getShopwarePlugininstaller_PluginServiceLocalService()
    {
        return $this->services['shopware_plugininstaller.plugin_service_local'] = new \Shopware\Bundle\PluginInstallerBundle\Service\PluginLocalService($this->get('dbal_connection'), $this->get('shopware_plugininstaller.plugin_installer_struct_hydrator'));
    }
    protected function getShopwarePlugininstaller_PluginServiceStoreProductionService()
    {
        return $this->services['shopware_plugininstaller.plugin_service_store_production'] = new \Shopware\Bundle\PluginInstallerBundle\Service\PluginStoreService($this->get('shopware_plugininstaller.store_client'), $this->get('shopware_plugininstaller.plugin_installer_struct_hydrator'));
    }
    protected function getShopwarePlugininstaller_PluginServiceViewService()
    {
        return $this->services['shopware_plugininstaller.plugin_service_view'] = new \Shopware\Bundle\PluginInstallerBundle\Service\PluginViewService($this->get('shopware_plugininstaller.plugin_service_local'), $this->get('shopware_plugininstaller.plugin_service_store_production'), $this->get('shopware_plugininstaller.plugin_installer_struct_hydrator'));
    }
    protected function getShopwarePlugininstaller_StoreClientService()
    {
        return $this->services['shopware_plugininstaller.store_client'] = new \Shopware\Bundle\PluginInstallerBundle\StoreClient($this->get('http_client'), 'https://api.shopware.com', $this->get('shopware_plugininstaller.plugin_installer_struct_hydrator'));
    }
    protected function getShopwarePlugininstaller_StoreOrderServiceService()
    {
        return $this->services['shopware_plugininstaller.store_order_service'] = new \Shopware\Bundle\PluginInstallerBundle\Service\StoreOrderService($this->get('shopware_plugininstaller.store_client'), $this->get('shopware_plugininstaller.plugin_installer_struct_hydrator'));
    }
    protected function getShopwarePlugininstaller_SubscriptionServiceService()
    {
        return $this->services['shopware_plugininstaller.subscription_service'] = new \Shopware\Bundle\PluginInstallerBundle\Service\SubscriptionService($this->get('dbal_connection'), $this->get('shopware_plugininstaller.store_client'), $this->get('models'));
    }
    protected function getShopwareProductStream_CriteriaFactoryService()
    {
        return $this->services['shopware_product_stream.criteria_factory'] = new \Shopware\Components\ProductStream\CriteriaFactory($this->get('shopware_search.store_front_criteria_factory'));
    }
    protected function getShopwareProductStream_FacetFilterService()
    {
        return $this->services['shopware_product_stream.facet_filter'] = new \Shopware\Components\ProductStream\FacetFilter();
    }
    protected function getShopwareProductStream_RepositoryService()
    {
        return $this->services['shopware_product_stream.repository'] = new \Shopware\Components\ProductStream\Repository($this->get('dbal_connection'));
    }
    protected function getShopwareSearch_CoreCriteriaRequestHandlerService()
    {
        return $this->services['shopware_search.core_criteria_request_handler'] = new \Shopware\Bundle\SearchBundle\CriteriaRequestHandler\CoreCriteriaRequestHandler($this->get('config'), $this->get('dbal_connection'));
    }
    protected function getShopwareSearch_ProductNumberSearchService()
    {
        return $this->services['shopware_search.product_number_search'] = new \Shopware\Bundle\SearchBundleDBAL\ProductNumberSearch($this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('shopware_storefront.attribute_hydrator_dbal'), $this->get('events'), array(0 => $this->get('shopware_searchdbal.vote_average_facet_handler_dbal'), 1 => $this->get('shopware_searchdbal.shipping_free_facet_handler_dbal'), 2 => $this->get('shopware_searchdbal.product_attribute_facet_handler_dbal'), 3 => $this->get('shopware_searchdbal.immediate_delivery_facet_handler_dbal'), 4 => $this->get('shopware_searchdbal.manufacturer_facet_handler_dbal'), 5 => $this->get('shopware_searchdbal.property_facet_handler_dbal'), 6 => $this->get('shopware_searchdbal.category_facet_handler_dbal'), 7 => $this->get('shopware_searchdbal.price_facet_handler_dbal')));
    }
    protected function getShopwareSearch_ProductSearchService()
    {
        return $this->services['shopware_search.product_search'] = new \Shopware\Bundle\SearchBundle\ProductSearch($this->get('shopware_storefront.list_product_service'), $this->get('shopware_search.product_number_search'));
    }
    protected function getShopwareSearch_PropertyCriteriaRequestHandlerService()
    {
        return $this->services['shopware_search.property_criteria_request_handler'] = new \Shopware\Bundle\SearchBundle\CriteriaRequestHandler\PropertyCriteriaRequestHandler($this->get('config'), $this->get('dbal_connection'));
    }
    protected function getShopwareSearch_StoreFrontCriteriaFactoryService()
    {
        return $this->services['shopware_search.store_front_criteria_factory'] = new \Shopware\Bundle\SearchBundle\StoreFrontCriteriaFactory($this->get('config'), $this->get('events'), array(0 => $this->get('shopware_search.core_criteria_request_handler'), 1 => $this->get('shopware_search.property_criteria_request_handler')));
    }
    protected function getShopwareSearchdbal_CacheKeywordFinderService()
    {
        return $this->services['shopware_searchdbal.cache_keyword_finder'] = new \Shopware\Bundle\SearchBundleDBAL\SearchTerm\CacheKeywordFinder($this->get('shopware_storefront.storefront_cache'), $this->get('config'), $this->get('shopware_searchdbal.keyword_finder_dbal'));
    }
    protected function getShopwareSearchdbal_CategoryConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.category_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\CategoryConditionHandler();
    }
    protected function getShopwareSearchdbal_CategoryFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.category_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\CategoryFacetHandler($this->get('shopware_storefront.category_service'), $this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('snippets'), $this->get('query_alias_mapper'), $this->get('dbal_connection'));
    }
    protected function getShopwareSearchdbal_CreateDateConditionHandlerService()
    {
        return $this->services['shopware_searchdbal.create_date_condition_handler'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\CreateDateConditionHandler();
    }
    protected function getShopwareSearchdbal_CustomerGroupConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.customer_group_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\CustomerGroupConditionHandler();
    }
    protected function getShopwareSearchdbal_DbalQueryBuilderFactoryService()
    {
        return $this->services['shopware_searchdbal.dbal_query_builder_factory'] = new \Shopware\Bundle\SearchBundleDBAL\QueryBuilderFactory($this->get('dbal_connection'), $this->get('events'), array(0 => $this->get('shopware_searchdbal.vote_average_condition_handler_dbal'), 1 => $this->get('shopware_searchdbal.is_available_condition_handler_dbal'), 2 => $this->get('shopware_searchdbal.has_price_condition_handler_dbal'), 3 => $this->get('shopware_searchdbal.has_pseudo_price_condition_handler_dbal'), 4 => $this->get('shopware_searchdbal.release_date_condition_handler'), 5 => $this->get('shopware_searchdbal.create_date_condition_handler'), 6 => $this->get('shopware_searchdbal.search_condition_handler_dbal'), 7 => $this->get('shopware_searchdbal.category_condition_handler_dbal'), 8 => $this->get('shopware_searchdbal.ordernumber_condition_handler_dbal'), 9 => $this->get('shopware_searchdbal.product_attribute_condition_handler_dbal'), 10 => $this->get('shopware_searchdbal.customer_group_condition_handler_dbal'), 11 => $this->get('shopware_searchdbal.immediate_delivery_condition_handler_dbal'), 12 => $this->get('shopware_searchdbal.manufacturer_condition_handler_dbal'), 13 => $this->get('shopware_searchdbal.property_condition_handler_dbal'), 14 => $this->get('shopware_searchdbal.shipping_free_condition_handler_dbal'), 15 => $this->get('shopware_searchdbal.sales_condition_handler_dbal'), 16 => $this->get('shopware_searchdbal.price_condition_handler_dbal')), array(0 => $this->get('shopware_searchdbal.product_name_sorting_handler_dbal'), 1 => $this->get('shopware_searchdbal.popularity_sorting_handler_dbal'), 2 => $this->get('shopware_searchdbal.shopware_searchdbal.product_attribute_sorting_handler_dbal'), 3 => $this->get('shopware_searchdbal.release_date_sorting_handler_dbal'), 4 => $this->get('shopware_searchdbal.price_sorting_handler_sorting_handler_dbal'), 5 => $this->get('shopware_searchdbal.search_ranking_sorting_handler_dbal')));
    }
    protected function getShopwareSearchdbal_HasPriceConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.has_price_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\HasPriceConditionHandler($this->get('shopware_searchdbal.search_price_helper_dbal'), $this->get('config'));
    }
    protected function getShopwareSearchdbal_HasPseudoPriceConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.has_pseudo_price_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\HasPseudoPriceConditionHandler($this->get('shopware_searchdbal.search_price_helper_dbal'), $this->get('config'));
    }
    protected function getShopwareSearchdbal_ImmediateDeliveryConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.immediate_delivery_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\ImmediateDeliveryConditionHandler();
    }
    protected function getShopwareSearchdbal_ImmediateDeliveryFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.immediate_delivery_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\ImmediateDeliveryFacetHandler($this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('snippets'), $this->get('query_alias_mapper'));
    }
    protected function getShopwareSearchdbal_IsAvailableConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.is_available_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\IsAvailableConditionHandler($this->get('shopware_searchdbal.search_price_helper_dbal'));
    }
    protected function getShopwareSearchdbal_KeywordFinderDbalService()
    {
        return $this->services['shopware_searchdbal.keyword_finder_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SearchTerm\KeywordFinder($this->get('config'), $this->get('dbal_connection'), $this->get('shopware_searchdbal.search_term_helper'));
    }
    protected function getShopwareSearchdbal_ManufacturerConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.manufacturer_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\ManufacturerConditionHandler();
    }
    protected function getShopwareSearchdbal_ManufacturerFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.manufacturer_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\ManufacturerFacetHandler($this->get('shopware_storefront.manufacturer_service'), $this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('snippets'), $this->get('query_alias_mapper'));
    }
    protected function getShopwareSearchdbal_OrdernumberConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.ordernumber_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\OrdernumberConditionHandler();
    }
    protected function getShopwareSearchdbal_PopularitySortingHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.popularity_sorting_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SortingHandler\PopularitySortingHandler();
    }
    protected function getShopwareSearchdbal_PriceConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.price_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\PriceConditionHandler($this->get('shopware_searchdbal.search_price_helper_dbal'));
    }
    protected function getShopwareSearchdbal_PriceFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.price_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\PriceFacetHandler($this->get('shopware_searchdbal.search_price_helper_dbal'), $this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('snippets'), $this->get('query_alias_mapper'));
    }
    protected function getShopwareSearchdbal_PriceSortingHandlerSortingHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.price_sorting_handler_sorting_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SortingHandler\PriceSortingHandler($this->get('shopware_searchdbal.search_price_helper_dbal'));
    }
    protected function getShopwareSearchdbal_ProductAttributeConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.product_attribute_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\ProductAttributeConditionHandler();
    }
    protected function getShopwareSearchdbal_ProductAttributeFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.product_attribute_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\ProductAttributeFacetHandler($this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('snippets'));
    }
    protected function getShopwareSearchdbal_ProductNameSortingHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.product_name_sorting_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SortingHandler\ProductNameSortingHandler();
    }
    protected function getShopwareSearchdbal_PropertyConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.property_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\PropertyConditionHandler();
    }
    protected function getShopwareSearchdbal_PropertyFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.property_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\PropertyFacetHandler($this->get('shopware_storefront.property_gateway'), $this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('query_alias_mapper'));
    }
    protected function getShopwareSearchdbal_ReleaseDateConditionHandlerService()
    {
        return $this->services['shopware_searchdbal.release_date_condition_handler'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\ReleaseDateConditionHandler();
    }
    protected function getShopwareSearchdbal_ReleaseDateSortingHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.release_date_sorting_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SortingHandler\ReleaseDateSortingHandler();
    }
    protected function getShopwareSearchdbal_SalesConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.sales_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\SalesConditionHandler();
    }
    protected function getShopwareSearchdbal_SearchConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.search_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\SearchTermConditionHandler($this->get('shopware_searchdbal.search_query_builder_dbal'));
    }
    protected function getShopwareSearchdbal_SearchIndexerService()
    {
        return $this->services['shopware_searchdbal.search_indexer'] = new \Shopware\Bundle\SearchBundleDBAL\SearchTerm\SearchIndexer($this->get('config'), $this->get('dbal_connection'), $this->get('shopware_searchdbal.search_term_helper'));
    }
    protected function getShopwareSearchdbal_SearchPriceHelperDbalService()
    {
        return $this->services['shopware_searchdbal.search_price_helper_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\PriceHelper($this->get('dbal_connection'), $this->get('config'));
    }
    protected function getShopwareSearchdbal_SearchQueryBuilderDbalService()
    {
        return $this->services['shopware_searchdbal.search_query_builder_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SearchTerm\SearchTermQueryBuilder($this->get('config'), $this->get('dbal_connection'), $this->get('shopware_searchdbal.cache_keyword_finder'), $this->get('shopware_searchdbal.search_indexer'), $this->get('shopware_searchdbal.search_term_helper'));
    }
    protected function getShopwareSearchdbal_SearchRankingSortingHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.search_ranking_sorting_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SortingHandler\SearchRankingSortingHandler();
    }
    protected function getShopwareSearchdbal_SearchTermHelperService()
    {
        return $this->services['shopware_searchdbal.search_term_helper'] = new \Shopware\Bundle\SearchBundleDBAL\SearchTerm\TermHelper($this->get('config'));
    }
    protected function getShopwareSearchdbal_SearchTermLoggerService()
    {
        return $this->services['shopware_searchdbal.search_term_logger'] = new \Shopware\Bundle\SearchBundleDBAL\SearchTerm\SearchTermLogger($this->get('dbal_connection'));
    }
    protected function getShopwareSearchdbal_ShippingFreeConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.shipping_free_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\ShippingFreeConditionHandler();
    }
    protected function getShopwareSearchdbal_ShippingFreeFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.shipping_free_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\ShippingFreeFacetHandler($this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('snippets'), $this->get('query_alias_mapper'));
    }
    protected function getShopwareSearchdbal_ShopwareSearchdbal_ProductAttributeSortingHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.shopware_searchdbal.product_attribute_sorting_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\SortingHandler\ProductAttributeSortingHandler();
    }
    protected function getShopwareSearchdbal_VoteAverageConditionHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.vote_average_condition_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\ConditionHandler\VoteAverageConditionHandler();
    }
    protected function getShopwareSearchdbal_VoteAverageFacetHandlerDbalService()
    {
        return $this->services['shopware_searchdbal.vote_average_facet_handler_dbal'] = new \Shopware\Bundle\SearchBundleDBAL\FacetHandler\VoteAverageFacetHandler($this->get('shopware_searchdbal.dbal_query_builder_factory'), $this->get('dbal_connection'), $this->get('snippets'), $this->get('query_alias_mapper'));
    }
    protected function getShopwareStorefront_AdditionalTextServiceService()
    {
        return $this->services['shopware_storefront.additional_text_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\AdditionalTextService($this->get('shopware_storefront.configurator_service'));
    }
    protected function getShopwareStorefront_AttributeHydratorDbalService()
    {
        return $this->services['shopware_storefront.attribute_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\AttributeHydrator();
    }
    protected function getShopwareStorefront_BaseProductFactoryService()
    {
        return $this->services['shopware_storefront.base_product_factory'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\BaseProductFactoryService($this->get('dbal_connection'));
    }
    protected function getShopwareStorefront_CategoryGatewayService()
    {
        return $this->services['shopware_storefront.category_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\CategoryGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.category_hydrator_dbal'));
    }
    protected function getShopwareStorefront_CategoryHydratorDbalService()
    {
        return $this->services['shopware_storefront.category_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\CategoryHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'), $this->get('shopware_storefront.media_hydrator_dbal'));
    }
    protected function getShopwareStorefront_CategoryServiceService()
    {
        return $this->services['shopware_storefront.category_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\CategoryService($this->get('shopware_storefront.category_gateway'));
    }
    protected function getShopwareStorefront_CheapestPriceGatewayService()
    {
        return $this->services['shopware_storefront.cheapest_price_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\CheapestPriceGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.price_hydrator_dbal'), $this->get('config'));
    }
    protected function getShopwareStorefront_CheapestPriceServiceService()
    {
        return $this->services['shopware_storefront.cheapest_price_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\CheapestPriceService($this->get('shopware_storefront.cheapest_price_gateway'), $this->get('shopware_storefront.graduated_prices_service'));
    }
    protected function getShopwareStorefront_ConfiguratorGatewayService()
    {
        return $this->services['shopware_storefront.configurator_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\ConfiguratorGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.configurator_hydrator_dbal'), $this->get('shopware_storefront.media_gateway'));
    }
    protected function getShopwareStorefront_ConfiguratorHydratorDbalService()
    {
        return $this->services['shopware_storefront.configurator_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\ConfiguratorHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ConfiguratorServiceService()
    {
        return $this->services['shopware_storefront.configurator_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ConfiguratorService($this->get('shopware_storefront.product_configuration_gateway'), $this->get('shopware_storefront.configurator_gateway'));
    }
    protected function getShopwareStorefront_ContextServiceService()
    {
        return $this->services['shopware_storefront.context_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ContextService($this, $this->get('shopware_storefront.customer_group_gateway'), $this->get('shopware_storefront.tax_gateway'), $this->get('shopware_storefront.country_gateway'), $this->get('shopware_storefront.price_group_discount_gateway'), $this->get('shopware_storefront.shop_gateway_dbal'), $this->get('shopware_storefront.currency_gateway_dbal'));
    }
    protected function getShopwareStorefront_CountryGatewayService()
    {
        return $this->services['shopware_storefront.country_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\CountryGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.country_hydrator_dbal'));
    }
    protected function getShopwareStorefront_CountryHydratorDbalService()
    {
        return $this->services['shopware_storefront.country_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\CountryHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_CurrencyGatewayDbalService()
    {
        return $this->services['shopware_storefront.currency_gateway_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\CurrencyGateway($this->get('shopware_storefront.currency_hydrator_dbal'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('dbal_connection'));
    }
    protected function getShopwareStorefront_CurrencyHydratorDbalService()
    {
        return $this->services['shopware_storefront.currency_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\CurrencyHydrator();
    }
    protected function getShopwareStorefront_CustomerGroupGatewayService()
    {
        return $this->services['shopware_storefront.customer_group_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\CustomerGroupGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.customer_group_hydrator_dbal'));
    }
    protected function getShopwareStorefront_CustomerGroupHydratorDbalService()
    {
        return $this->services['shopware_storefront.customer_group_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\CustomerGroupHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_DownloadGatewayService()
    {
        return $this->services['shopware_storefront.download_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\DownloadGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.download_hydrator_dbal'));
    }
    protected function getShopwareStorefront_DownloadHydratorDbalService()
    {
        return $this->services['shopware_storefront.download_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\DownloadHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_EsdHydratorDbalService()
    {
        return $this->services['shopware_storefront.esd_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\EsdHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_FieldHelperDbalService()
    {
        return $this->services['shopware_storefront.field_helper_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\FieldHelper($this->get('dbal_connection'), $this->get('shopware_storefront.storefront_cache'));
    }
    protected function getShopwareStorefront_GraduatedPricesGatewayService()
    {
        return $this->services['shopware_storefront.graduated_prices_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\GraduatedPricesGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.price_hydrator_dbal'));
    }
    protected function getShopwareStorefront_GraduatedPricesServiceService()
    {
        return $this->services['shopware_storefront.graduated_prices_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\GraduatedPricesService($this->get('shopware_storefront.graduated_prices_gateway'));
    }
    protected function getShopwareStorefront_LinkGatewayService()
    {
        return $this->services['shopware_storefront.link_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\LinkGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.link_hydrator_dbal'));
    }
    protected function getShopwareStorefront_LinkHydratorDbalService()
    {
        return $this->services['shopware_storefront.link_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\LinkHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ListProductGatewayService()
    {
        return $this->services['shopware_storefront.list_product_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\ListProductGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.product_hydrator_dbal'), $this->get('config'));
    }
    protected function getShopwareStorefront_ListProductServiceService()
    {
        return $this->services['shopware_storefront.list_product_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ListProductService($this->get('shopware_storefront.list_product_gateway'), $this->get('shopware_storefront.graduated_prices_service'), $this->get('shopware_storefront.cheapest_price_service'), $this->get('shopware_storefront.price_calculation_service'), $this->get('shopware_storefront.media_service'), $this->get('shopware_storefront.marketing_service'), $this->get('shopware_storefront.vote_service'), $this->get('events'));
    }
    protected function getShopwareStorefront_LocaleHydratorDbalService()
    {
        return $this->services['shopware_storefront.locale_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\LocaleHydrator();
    }
    protected function getShopwareStorefront_ManufacturerGatewayService()
    {
        return $this->services['shopware_storefront.manufacturer_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\ManufacturerGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.manufacturer_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ManufacturerHydratorDbalService()
    {
        return $this->services['shopware_storefront.manufacturer_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\ManufacturerHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ManufacturerServiceService()
    {
        return $this->services['shopware_storefront.manufacturer_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ManufacturerService($this->get('shopware_storefront.manufacturer_gateway'));
    }
    protected function getShopwareStorefront_MarketingServiceService()
    {
        return $this->services['shopware_storefront.marketing_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\MarketingService($this->get('config'));
    }
    protected function getShopwareStorefront_MediaGatewayService()
    {
        return $this->services['shopware_storefront.media_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\MediaGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.media_hydrator_dbal'));
    }
    protected function getShopwareStorefront_MediaHydratorDbalService()
    {
        return $this->services['shopware_storefront.media_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\MediaHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'), $this->get('thumbnail_manager'), $this->get('shopware_media.media_service'), $this->get('dbal_connection'));
    }
    protected function getShopwareStorefront_MediaServiceService()
    {
        return $this->services['shopware_storefront.media_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\MediaService($this->get('shopware_storefront.media_gateway'), $this->get('shopware_storefront.product_media_gateway'), $this->get('shopware_storefront.variant_media_gateway'), $this->get('config'));
    }
    protected function getShopwareStorefront_PriceCalculationServiceService()
    {
        return $this->services['shopware_storefront.price_calculation_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\PriceCalculationService($this->get('shopware_storefront.price_group_discount_gateway'));
    }
    protected function getShopwareStorefront_PriceGroupDiscountGatewayService()
    {
        return $this->services['shopware_storefront.price_group_discount_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\PriceGroupDiscountGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.price_hydrator_dbal'));
    }
    protected function getShopwareStorefront_PriceHydratorDbalService()
    {
        return $this->services['shopware_storefront.price_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\PriceHydrator($this->get('shopware_storefront.customer_group_hydrator_dbal'), $this->get('shopware_storefront.unit_hydrator_dbal'), $this->get('shopware_storefront.attribute_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ProductConfigurationGatewayService()
    {
        return $this->services['shopware_storefront.product_configuration_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\ProductConfigurationGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.configurator_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ProductDownloadServiceService()
    {
        return $this->services['shopware_storefront.product_download_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ProductDownloadService($this->get('shopware_storefront.download_gateway'));
    }
    protected function getShopwareStorefront_ProductHydratorDbalService()
    {
        return $this->services['shopware_storefront.product_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\ProductHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'), $this->get('shopware_storefront.manufacturer_hydrator_dbal'), $this->get('shopware_storefront.tax_hydrator_dbal'), $this->get('shopware_storefront.unit_hydrator_dbal'), $this->get('shopware_storefront.esd_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ProductLinkServiceService()
    {
        return $this->services['shopware_storefront.product_link_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ProductLinkService($this->get('shopware_storefront.link_gateway'));
    }
    protected function getShopwareStorefront_ProductMediaGatewayService()
    {
        return $this->services['shopware_storefront.product_media_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\ProductMediaGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.media_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ProductNumberServiceService()
    {
        return $this->services['shopware_storefront.product_number_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ProductNumberService($this->get('dbal_connection'), $this->get('config'));
    }
    protected function getShopwareStorefront_ProductPropertyGatewayService()
    {
        return $this->services['shopware_storefront.product_property_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\ProductPropertyGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.property_hydrator_dbal'));
    }
    protected function getShopwareStorefront_ProductServiceService()
    {
        return $this->services['shopware_storefront.product_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\ProductService($this->get('shopware_storefront.list_product_service'), $this->get('shopware_storefront.vote_service'), $this->get('shopware_storefront.media_service'), $this->get('shopware_storefront.related_products_service'), $this->get('shopware_storefront.related_product_streams_service'), $this->get('shopware_storefront.similar_products_service'), $this->get('shopware_storefront.product_download_service'), $this->get('shopware_storefront.product_link_service'), $this->get('shopware_storefront.property_service'), $this->get('shopware_storefront.configurator_service'), $this->get('events'));
    }
    protected function getShopwareStorefront_ProductStreamHydratorDbalService()
    {
        return $this->services['shopware_storefront.product_stream_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\ProductStreamHydrator();
    }
    protected function getShopwareStorefront_PropertyGatewayService()
    {
        return $this->services['shopware_storefront.property_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\PropertyGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.property_hydrator_dbal'), $this->get('config'));
    }
    protected function getShopwareStorefront_PropertyHydratorDbalService()
    {
        return $this->services['shopware_storefront.property_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\PropertyHydrator($this->get('shopware_storefront.attribute_hydrator_dbal'), $this->get('shopware_storefront.media_hydrator_dbal'));
    }
    protected function getShopwareStorefront_PropertyServiceService()
    {
        return $this->services['shopware_storefront.property_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\PropertyService($this->get('shopware_storefront.product_property_gateway'));
    }
    protected function getShopwareStorefront_RelatedProductStreamsGatewayService()
    {
        return $this->services['shopware_storefront.related_product_streams_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\RelatedProductStreamsGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.product_stream_hydrator_dbal'));
    }
    protected function getShopwareStorefront_RelatedProductStreamsServiceService()
    {
        return $this->services['shopware_storefront.related_product_streams_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\RelatedProductStreamsService($this->get('shopware_storefront.related_product_streams_gateway'));
    }
    protected function getShopwareStorefront_RelatedProductsGatewayService()
    {
        return $this->services['shopware_storefront.related_products_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\RelatedProductsGateway($this->get('dbal_connection'));
    }
    protected function getShopwareStorefront_RelatedProductsServiceService()
    {
        return $this->services['shopware_storefront.related_products_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\RelatedProductsService($this->get('shopware_storefront.related_products_gateway'), $this->get('shopware_storefront.list_product_service'));
    }
    protected function getShopwareStorefront_ShopGatewayDbalService()
    {
        return $this->services['shopware_storefront.shop_gateway_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\ShopGateway($this->get('shopware_storefront.shop_hydrator_dbal'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('dbal_connection'));
    }
    protected function getShopwareStorefront_ShopHydratorDbalService()
    {
        return $this->services['shopware_storefront.shop_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\ShopHydrator($this->get('shopware_storefront.template_hydrator_dbal'), $this->get('shopware_storefront.category_hydrator_dbal'), $this->get('shopware_storefront.locale_hydrator_dbal'), $this->get('shopware_storefront.currency_hydrator_dbal'), $this->get('shopware_storefront.customer_group_hydrator_dbal'));
    }
    protected function getShopwareStorefront_SimilarProductsGatewayService()
    {
        return $this->services['shopware_storefront.similar_products_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\SimilarProductsGateway($this->get('dbal_connection'), $this->get('config'));
    }
    protected function getShopwareStorefront_SimilarProductsServiceService()
    {
        return $this->services['shopware_storefront.similar_products_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\SimilarProductsService($this->get('shopware_storefront.similar_products_gateway'), $this->get('shopware_storefront.list_product_service'), $this->get('config'));
    }
    protected function getShopwareStorefront_StorefrontCacheService()
    {
        return $this->services['shopware_storefront.storefront_cache'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\CoreCache($this->get('models_metadata_cache'));
    }
    protected function getShopwareStorefront_TaxGatewayService()
    {
        return $this->services['shopware_storefront.tax_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\TaxGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.tax_hydrator_dbal'));
    }
    protected function getShopwareStorefront_TaxHydratorDbalService()
    {
        return $this->services['shopware_storefront.tax_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\TaxHydrator();
    }
    protected function getShopwareStorefront_TemplateHydratorDbalService()
    {
        return $this->services['shopware_storefront.template_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\TemplateHydrator();
    }
    protected function getShopwareStorefront_UnitHydratorDbalService()
    {
        return $this->services['shopware_storefront.unit_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\UnitHydrator();
    }
    protected function getShopwareStorefront_VariantMediaGatewayService()
    {
        return $this->services['shopware_storefront.variant_media_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\VariantMediaGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.media_hydrator_dbal'));
    }
    protected function getShopwareStorefront_VoteAverageGatewayService()
    {
        return $this->services['shopware_storefront.vote_average_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\VoteAverageGateway($this->get('dbal_connection'), $this->get('shopware_storefront.vote_hydrator_dbal'));
    }
    protected function getShopwareStorefront_VoteGatewayService()
    {
        return $this->services['shopware_storefront.vote_gateway'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\VoteGateway($this->get('dbal_connection'), $this->get('shopware_storefront.field_helper_dbal'), $this->get('shopware_storefront.vote_hydrator_dbal'));
    }
    protected function getShopwareStorefront_VoteHydratorDbalService()
    {
        return $this->services['shopware_storefront.vote_hydrator_dbal'] = new \Shopware\Bundle\StoreFrontBundle\Gateway\DBAL\Hydrator\VoteHydrator();
    }
    protected function getShopwareStorefront_VoteServiceService()
    {
        return $this->services['shopware_storefront.vote_service'] = new \Shopware\Bundle\StoreFrontBundle\Service\Core\VoteService($this->get('shopware_storefront.vote_gateway'), $this->get('shopware_storefront.vote_average_gateway'));
    }
    protected function getSitemapxml_RepositoryService()
    {
        return $this->services['sitemapxml.repository'] = new \Shopware\Components\SitemapXMLRepository($this->get('models'), $this->get('shopware_storefront.context_service'));
    }
    protected function getSnippetsService()
    {
        return $this->services['snippets'] = new \Shopware_Components_Snippet_Manager($this->get('models'), array('readFromDb' => true, 'writeToDb' => true, 'readFromIni' => false, 'writeToIni' => false, 'showSnippetPlaceholder' => false));
    }
    protected function getTemplateService()
    {
        return $this->services['template'] = $this->get('template_factory')->factory($this->get('events'), new \Enlight_Components_Snippet_Resource($this->get('snippets'), false), $this->get('shopware.escaper'), array('compileCheck' => true, 'compileLocking' => true, 'useSubDirs' => true, 'forceCompile' => false, 'useIncludePath' => true, 'charset' => 'utf-8', 'forceCache' => false, 'cacheDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/templates', 'compileDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/templates'));
    }
    protected function getTemplateFactoryService()
    {
        return $this->services['template_factory'] = new \Shopware\Components\DependencyInjection\Bridge\Template();
    }
    protected function getTemplatemailService()
    {
        return $this->services['templatemail'] = $this->get('templatemail_factory')->factory($this);
    }
    protected function getTemplatemailFactoryService()
    {
        return $this->services['templatemail_factory'] = new \Shopware\Components\DependencyInjection\Bridge\TemplateMail();
    }
    protected function getThemeBackendRegistrationService()
    {
        return $this->services['theme_backend_registration'] = new \Shopware\Components\Theme\EventListener\BackendTheme($this);
    }
    protected function getThemeCompilerService()
    {
        return $this->services['theme_compiler'] = new \Shopware\Components\Theme\Compiler('C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware', $this->get('oyejorge_compiler'), $this->get('theme_path_resolver'), $this->get('theme_inheritance'), $this->get('theme_service'), $this->get('js_compressor'), $this->get('events'));
    }
    protected function getThemeConfigLoaderService()
    {
        return $this->services['theme_config_loader'] = new \Shopware\Components\Theme\EventListener\ConfigLoader($this);
    }
    protected function getThemeConfigPersisterService()
    {
        return $this->services['theme_config_persister'] = new \Shopware\Components\Form\Persister\Theme($this->get('models'));
    }
    protected function getThemeConfiguratorService()
    {
        return $this->services['theme_configurator'] = new \Shopware\Components\Theme\Configurator($this->get('models'), $this->get('theme_util'), $this->get('theme_config_persister'), $this->get('events'));
    }
    protected function getThemeGeneratorService()
    {
        return $this->services['theme_generator'] = new \Shopware\Components\Theme\Generator($this->get('theme_path_resolver'), $this->get('file_system'), $this->get('events'));
    }
    protected function getThemeInheritanceService()
    {
        return $this->services['theme_inheritance'] = new \Shopware\Components\Theme\Inheritance($this->get('models'), $this->get('theme_util'), $this->get('theme_path_resolver'), $this->get('events'), $this->get('shopware_media.media_service'));
    }
    protected function getThemeInstallerService()
    {
        return $this->services['theme_installer'] = new \Shopware\Components\Theme\Installer($this->get('models'), $this->get('theme_configurator'), $this->get('theme_path_resolver'), $this->get('theme_util'), $this->get('shopware.snippet_database_handler'), $this->get('theme_service'), array('readFromDb' => true, 'writeToDb' => true, 'readFromIni' => false, 'writeToIni' => false, 'showSnippetPlaceholder' => false));
    }
    protected function getThemePathResolverService()
    {
        return $this->services['theme_path_resolver'] = new \Shopware\Components\Theme\PathResolver('C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware', $this->get('template'));
    }
    protected function getThemeServiceService()
    {
        return $this->services['theme_service'] = new \Shopware\Components\Theme\Service($this->get('models'), $this->get('snippets'), $this->get('theme_util'), $this->get('shopware_media.media_service'));
    }
    protected function getThemeUtilService()
    {
        return $this->services['theme_util'] = new \Shopware\Components\Theme\Util($this->get('models'), $this->get('theme_path_resolver'));
    }
    protected function getThumbnailGeneratorBasicService()
    {
        return $this->services['thumbnail_generator_basic'] = new \Shopware\Components\Thumbnail\Generator\Basic($this->get('config'), $this->get('shopware_media.media_service'));
    }
    protected function getThumbnailManagerService()
    {
        return $this->services['thumbnail_manager'] = new \Shopware\Components\Thumbnail\Manager($this->get('thumbnail_generator_basic'), 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware', $this->get('events'), $this->get('shopware_media.media_service'));
    }
    protected function getValidator_EmailService()
    {
        return $this->services['validator.email'] = new \Shopware\Components\Validator\EmailValidator();
    }
    protected function getMonolog_Processor_UidService()
    {
        return $this->services['monolog.processor.uid'] = new \Monolog\Processor\UidProcessor();
    }
    public function getParameter($name)
    {
        $name = strtolower($name);
        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        return $this->parameters[$name];
    }
    public function hasParameter($name)
    {
        $name = strtolower($name);
        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }
        return $this->parameterBag;
    }
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware',
            'kernel.environment' => 'production',
            'kernel.debug' => false,
            'kernel.name' => 'Shopware',
            'kernel.cache_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322',
            'kernel.logs_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/log',
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'ShopwareProductionProjectContainer',
            'monolog.logger.constant.critical' => 500,
            'monolog.logger.constant.error' => 400,
            'monolog.logger.constant.info' => 200,
            'shopware.custom' => array(
            ),
            'shopware.trustedproxies' => array(
            ),
            'shopware.cdn' => array(
                'backend' => 'local',
                'strategy' => 'md5',
                'adapters' => array(
                    'local' => array(
                        'type' => 'local',
                        'mediaUrl' => '',
                        'path' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware',
                    ),
                    'ftp' => array(
                        'type' => 'ftp',
                        'mediaUrl' => '',
                        'host' => '',
                        'username' => '',
                        'password' => '',
                        'port' => 21,
                        'root' => '/',
                        'passive' => true,
                        'ssl' => false,
                        'timeout' => 30,
                    ),
                ),
            ),
            'shopware.cdn.backend' => 'local',
            'shopware.cdn.strategy' => 'md5',
            'shopware.cdn.adapters' => array(
                'local' => array(
                    'type' => 'local',
                    'mediaUrl' => '',
                    'path' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware',
                ),
                'ftp' => array(
                    'type' => 'ftp',
                    'mediaUrl' => '',
                    'host' => '',
                    'username' => '',
                    'password' => '',
                    'port' => 21,
                    'root' => '/',
                    'passive' => true,
                    'ssl' => false,
                    'timeout' => 30,
                ),
            ),
            'shopware.cdn.adapters.local' => array(
                'type' => 'local',
                'mediaUrl' => '',
                'path' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware',
            ),
            'shopware.cdn.adapters.local.type' => 'local',
            'shopware.cdn.adapters.local.mediaurl' => '',
            'shopware.cdn.adapters.local.path' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware',
            'shopware.cdn.adapters.ftp' => array(
                'type' => 'ftp',
                'mediaUrl' => '',
                'host' => '',
                'username' => '',
                'password' => '',
                'port' => 21,
                'root' => '/',
                'passive' => true,
                'ssl' => false,
                'timeout' => 30,
            ),
            'shopware.cdn.adapters.ftp.type' => 'ftp',
            'shopware.cdn.adapters.ftp.mediaurl' => '',
            'shopware.cdn.adapters.ftp.host' => '',
            'shopware.cdn.adapters.ftp.username' => '',
            'shopware.cdn.adapters.ftp.password' => '',
            'shopware.cdn.adapters.ftp.port' => 21,
            'shopware.cdn.adapters.ftp.root' => '/',
            'shopware.cdn.adapters.ftp.passive' => true,
            'shopware.cdn.adapters.ftp.ssl' => false,
            'shopware.cdn.adapters.ftp.timeout' => 30,
            'shopware.snippet' => array(
                'readFromDb' => true,
                'writeToDb' => true,
                'readFromIni' => false,
                'writeToIni' => false,
                'showSnippetPlaceholder' => false,
            ),
            'shopware.snippet.readfromdb' => true,
            'shopware.snippet.writetodb' => true,
            'shopware.snippet.readfromini' => false,
            'shopware.snippet.writetoini' => false,
            'shopware.snippet.showsnippetplaceholder' => false,
            'shopware.errorhandler' => array(
                'throwOnRecoverableError' => false,
            ),
            'shopware.errorhandler.throwonrecoverableerror' => false,
            'shopware.db' => array(
                'username' => 'shopware',
                'password' => 'goucher',
                'dbname' => 'shopware',
                'host' => 'localhost',
                'charset' => 'utf8',
                'adapter' => 'pdo_mysql',
                'port' => '3306',
            ),
            'shopware.db.username' => 'shopware',
            'shopware.db.password' => 'goucher',
            'shopware.db.dbname' => 'shopware',
            'shopware.db.host' => 'localhost',
            'shopware.db.charset' => 'utf8',
            'shopware.db.adapter' => 'pdo_mysql',
            'shopware.db.port' => '3306',
            'shopware.es' => array(
                'prefix' => 'sw_shop',
                'enabled' => false,
                'client' => array(
                    'hosts' => array(
                        0 => 'localhost:9200',
                    ),
                ),
            ),
            'shopware.es.prefix' => 'sw_shop',
            'shopware.es.enabled' => false,
            'shopware.es.client' => array(
                'hosts' => array(
                    0 => 'localhost:9200',
                ),
            ),
            'shopware.es.client.hosts' => array(
                0 => 'localhost:9200',
            ),
            'shopware.es.client.hosts.0' => 'localhost:9200',
            'shopware.front' => array(
                'noErrorHandler' => false,
                'throwExceptions' => false,
                'disableOutputBuffering' => false,
                'showException' => false,
                'charset' => 'utf-8',
            ),
            'shopware.front.noerrorhandler' => false,
            'shopware.front.throwexceptions' => false,
            'shopware.front.disableoutputbuffering' => false,
            'shopware.front.showexception' => false,
            'shopware.front.charset' => 'utf-8',
            'shopware.config' => array(
            ),
            'shopware.store' => array(
                'apiEndpoint' => 'https://api.shopware.com',
            ),
            'shopware.store.apiendpoint' => 'https://api.shopware.com',
            'shopware.plugins' => array(
            ),
            'shopware.template' => array(
                'compileCheck' => true,
                'compileLocking' => true,
                'useSubDirs' => true,
                'forceCompile' => false,
                'useIncludePath' => true,
                'charset' => 'utf-8',
                'forceCache' => false,
                'cacheDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/templates',
                'compileDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/templates',
            ),
            'shopware.template.compilecheck' => true,
            'shopware.template.compilelocking' => true,
            'shopware.template.usesubdirs' => true,
            'shopware.template.forcecompile' => false,
            'shopware.template.useincludepath' => true,
            'shopware.template.charset' => 'utf-8',
            'shopware.template.forcecache' => false,
            'shopware.template.cachedir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/templates',
            'shopware.template.compiledir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/templates',
            'shopware.mail' => array(
                'charset' => 'utf-8',
            ),
            'shopware.mail.charset' => 'utf-8',
            'shopware.httpcache' => array(
                'enabled' => true,
                'debug' => false,
                'default_ttl' => 0,
                'private_headers' => array(
                    0 => 'Authorization',
                    1 => 'Cookie',
                ),
                'allow_reload' => false,
                'allow_revalidate' => false,
                'stale_while_revalidate' => 2,
                'stale_if_error' => false,
                'cache_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/html',
                'cache_cookies' => array(
                    0 => 'shop',
                    1 => 'currency',
                    2 => 'x-cache-context-hash',
                ),
            ),
            'shopware.httpcache.enabled' => true,
            'shopware.httpcache.debug' => false,
            'shopware.httpcache.default_ttl' => 0,
            'shopware.httpcache.private_headers' => array(
                0 => 'Authorization',
                1 => 'Cookie',
            ),
            'shopware.httpcache.private_headers.0' => 'Authorization',
            'shopware.httpcache.private_headers.1' => 'Cookie',
            'shopware.httpcache.allow_reload' => false,
            'shopware.httpcache.allow_revalidate' => false,
            'shopware.httpcache.stale_while_revalidate' => 2,
            'shopware.httpcache.stale_if_error' => false,
            'shopware.httpcache.cache_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/html',
            'shopware.httpcache.cache_cookies' => array(
                0 => 'shop',
                1 => 'currency',
                2 => 'x-cache-context-hash',
            ),
            'shopware.httpcache.cache_cookies.0' => 'shop',
            'shopware.httpcache.cache_cookies.1' => 'currency',
            'shopware.httpcache.cache_cookies.2' => 'x-cache-context-hash',
            'shopware.session' => array(
                'name' => 'SHOPWARESID',
                'cookie_lifetime' => 0,
                'use_trans_sid' => false,
                'gc_probability' => 1,
                'gc_divisor' => 100,
                'save_handler' => 'db',
            ),
            'shopware.session.name' => 'SHOPWARESID',
            'shopware.session.cookie_lifetime' => 0,
            'shopware.session.use_trans_sid' => false,
            'shopware.session.gc_probability' => 1,
            'shopware.session.gc_divisor' => 100,
            'shopware.session.save_handler' => 'db',
            'shopware.phpsettings' => array(
                'error_reporting' => 32767,
                'display_errors' => 1,
                'date.timezone' => 'Europe/Berlin',
            ),
            'shopware.phpsettings.error_reporting' => 32767,
            'shopware.phpsettings.display_errors' => 1,
            'shopware.phpsettings.date.timezone' => 'Europe/Berlin',
            'shopware.cache' => array(
                'frontendOptions' => array(
                    'automatic_serialization' => true,
                    'automatic_cleaning_factor' => 0,
                    'lifetime' => 3600,
                    'cache_id_prefix' => '4ab5bb1467dda5a4a01a404f337a6454',
                ),
                'backend' => 'auto',
                'backendOptions' => array(
                    'hashed_directory_perm' => 505,
                    'cache_file_perm' => 420,
                    'hashed_directory_level' => 3,
                    'cache_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/general',
                    'file_name_prefix' => 'shopware',
                ),
            ),
            'shopware.cache.frontendoptions' => array(
                'automatic_serialization' => true,
                'automatic_cleaning_factor' => 0,
                'lifetime' => 3600,
                'cache_id_prefix' => '4ab5bb1467dda5a4a01a404f337a6454',
            ),
            'shopware.cache.frontendoptions.automatic_serialization' => true,
            'shopware.cache.frontendoptions.automatic_cleaning_factor' => 0,
            'shopware.cache.frontendoptions.lifetime' => 3600,
            'shopware.cache.frontendoptions.cache_id_prefix' => '4ab5bb1467dda5a4a01a404f337a6454',
            'shopware.cache.backend' => 'auto',
            'shopware.cache.backendoptions' => array(
                'hashed_directory_perm' => 505,
                'cache_file_perm' => 420,
                'hashed_directory_level' => 3,
                'cache_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/general',
                'file_name_prefix' => 'shopware',
            ),
            'shopware.cache.backendoptions.hashed_directory_perm' => 505,
            'shopware.cache.backendoptions.cache_file_perm' => 420,
            'shopware.cache.backendoptions.hashed_directory_level' => 3,
            'shopware.cache.backendoptions.cache_dir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/general',
            'shopware.cache.backendoptions.file_name_prefix' => 'shopware',
            'shopware.hook' => array(
                'proxyDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/proxies',
                'proxyNamespace' => 'Shopware_Proxies',
            ),
            'shopware.hook.proxydir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/proxies',
            'shopware.hook.proxynamespace' => 'Shopware_Proxies',
            'shopware.model' => array(
                'autoGenerateProxyClasses' => false,
                'fileCacheDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/filecache',
                'attributeDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/attributes',
                'proxyDir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/proxies',
                'proxyNamespace' => 'Shopware\\Proxies',
                'cacheProvider' => 'auto',
                'cacheNamespace' => NULL,
            ),
            'shopware.model.autogenerateproxyclasses' => false,
            'shopware.model.filecachedir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/filecache',
            'shopware.model.attributedir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/attributes',
            'shopware.model.proxydir' => 'C:\\Users\\jkeull\\Documents\\xampp\\htdocs\\shopware/var/cache/production_201510221322/doctrine/proxies',
            'shopware.model.proxynamespace' => 'Shopware\\Proxies',
            'shopware.model.cacheprovider' => 'auto',
            'shopware.model.cachenamespace' => NULL,
            'shopware.backendsession' => array(
                'name' => 'SHOPWAREBACKEND',
                'cookie_lifetime' => 0,
                'cookie_httponly' => 1,
                'use_trans_sid' => false,
                'referer_check' => true,
                'client_check' => false,
            ),
            'shopware.backendsession.name' => 'SHOPWAREBACKEND',
            'shopware.backendsession.cookie_lifetime' => 0,
            'shopware.backendsession.cookie_httponly' => 1,
            'shopware.backendsession.use_trans_sid' => false,
            'shopware.backendsession.referer_check' => true,
            'shopware.backendsession.client_check' => false,
        );
    }
}
