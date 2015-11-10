Ext.define('Shopware.apps.TrustedShops', {
    extend: 'Enlight.app.SubApplication',

    name: 'Shopware.apps.TrustedShops',

    loadPath: '{url action=load}',

    bulkLoad: true,

    controllers: ['Main'],

    views: [
        'main.Window',
        'main.Excellence',
        'main.Ratings',
        'main.Badge'
    ],

    models: ['TrustedShops'],

    store: ['TrustedShops'],

    launch: function() {
        return this.getController('Main').mainWindow;
    }
});