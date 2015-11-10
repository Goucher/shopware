Ext.define('Shopware.apps.TrustedShops.model.TrustedShops', {

    /**
     * Extends the standard Ext Model
     * @string
     */
    extend: 'Ext.data.Model',

    idProperty: 'shopId',

    fields: [
        { name: 'shopId', type: 'int' },
        { name: 'trustedShopsId', type: 'string' },
        { name: 'trustedShopsUser', type: 'string' },
        { name: 'trustedShopsPassword', type: 'string' },
        { name: 'emptyId', type: 'string' },
        { name: 'emptyUser', type: 'string' },
        { name: 'emptyPassword', type: 'string' },
        { name: 'trustedShopsTestSystem', type: 'boolean' },
        { name: 'trustedShopsShowRatingWidget', type: 'boolean' },
        { name: 'trustedShopsShowRatingsButtons', type: 'boolean' },
        { name: 'trustedShopsRateLaterDays', type: 'int' },
		{ name: 'trustedShopsLanguageRatingButtons', type: 'string' },
		{ name: 'trustedShopsWidthRatingButtons', type: 'int' },
        { name: 'trustedShopsTrustBadgeCode', type: 'string' },
		{ name: 'trustedShopsValuesFromDefault', type: 'boolean' },
        { name: 'trustedShopsBackendLanguage', type: 'string' },
        { name: 'trustedShopsInStockDeliveryTime', type: 'int'},
        { name: 'trustedShopsNotInStockDeliveryTime', type: 'int'}
    ],

    /**
     * Configure the data communication
     * @object
     */
    proxy: {
        type: 'ajax',

        /**
         * Configure the url mapping for the different
         * store operations based on
         * @object
         */
        api: {
            read: '{url controller="TrustedShops" action="getSettings"}',
            create: '{url controller="TrustedShops" action="setSettings"}',
            update: '{url controller="TrustedShops" action="setSettings"}'
        },

        /**
         * Configure the data reader
         * @object
         */
        reader: {
            type: 'json',
            root: 'data'
        }
    }
});