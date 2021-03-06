Ext.define('Shopware.apps.TrustedShops.store.TrustedShops', {

    /**
     * Define that this component is an extension of the Ext.data.Store
     */
    extend: 'Ext.data.Store',

    /**
     * Define the used model for this store
     * @string
     */
    model: 'Shopware.apps.TrustedShops.model.TrustedShops',

    /**
     * Auto load the store after the component
     * is initialized
     * @boolean
     */
    autoLoad: false,

    /**
     * Enable remote sorting
     */
    remoteSort: true,

    /**
     * Enable remote filtering
     */
    remoteFilter: true
});