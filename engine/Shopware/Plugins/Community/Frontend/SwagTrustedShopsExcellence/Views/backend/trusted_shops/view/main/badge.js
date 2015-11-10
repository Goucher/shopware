//{namespace name=backend/trusted_shops/view/main}
//{block name="backend/trusted_shops/view/badge"}
Ext.define('Shopware.apps.TrustedShops.view.main.Badge', {
    extend: 'Ext.container.Container',
    alias: 'widget.trustedShops-main-badge',

    layout: 'anchor',
    padding: 10,
    defaults: {
        anchor: '100%',
        labelWidth: 200
    },

    /**
     * Contains all snippets for the component
     * @object
     */
    snippets: {
        trustedShopsTrustBadgeCode: '{s name=badge/trustedShopsTrustBadgeCode}Trustbadge code{/s}',
        trustedShopsTrustBadgeUrl: '{s name=badge/trustedShopsTrustBadgeUrl}To generate the individual Trustbadge code for your shop, go to the Trusted Shops integration center.{/s}',
        trustedShopsRegisterUrl: '{s name=badge/trustedShopsRegisterUrl} Get informed and sign up!{/s}',
        trustedShopsId: '{s name=badge/trustedShopsId}Trusted Shops ID{/s}',
        trustedShopsTrustBadgeCodeEmptyText: '{s name=badge/trustedShopsTrustBadgeCodeEmptyText}Fill in your Trustbadge code here...{/s}',
        inStockDeliveryTime: '{s name=badge/inStockDeliveryTime}Standard delivery time{/s}',
        notInStockDeliveryTime: '{s name=badge/notInStockDeliveryTime}Not in stock delivery time{/s}'
    },

    /**
     * Sets up the ui component
     *
     * @return void
     */
    initComponent: function() {
        var me = this;

        me.items = me.getItems();

        me.callParent(arguments);
    },

    /**
     * Creates items shown in form panel
     *
     * @return array
     */
    getItems: function() {
        var me = this;

        var items = [
            {
                xtype: 'panel',
                border: false,
                height: 330,
                html: '<br/><center><img src="{link file="backend/trusted_shops/images/customer_reviews.png"}"></center><br/>'
            },
            {
                xtype: 'button',
                name: 'trustedShopsRegisterUrl',
                text: me.snippets.trustedShopsRegisterUrl,
                cls: 'secondary small',
                handler: function() {
                    me.fireEvent('openRegisterUrl')
                },
                style: {
                    marginTop: '10px',
                    marginBottom: '10px'
                }
            },
            {
                xtype: 'textfield',
                name: 'trustedShopsId',
                fieldLabel: me.snippets.trustedShopsId,
                style: {
                    marginBottom: '10px'
                }
            },
            {
                xtype: 'button',
                name: 'trustedShopsTrustBadgeUrl',
                text: me.snippets.trustedShopsTrustBadgeUrl,
                cls: 'secondary small',
                handler: function() {
                    me.fireEvent('openBadgeUrl');
                },
                style: {
                    marginBottom: '10px'
                }
            },
            {
                xtype: 'textarea',
                name: 'trustedShopsTrustBadgeCode',
                fieldLabel: me.snippets.trustedShopsTrustBadgeCode,
                height: 190,
                emptyText: me.snippets.trustedShopsTrustBadgeCodeEmptyText
            },
            {
                xtype: 'numberfield',
                name: 'trustedShopsInStockDeliveryTime',
                fieldLabel: me.snippets.inStockDeliveryTime,
                minValue: 0,
                maxValue: 100,
                style: {
                    marginBottom: '10px'
                }
            },
            {
                xtype: 'numberfield',
                name: 'trustedShopsNotInStockDeliveryTime',
                fieldLabel: me.snippets.notInStockDeliveryTime,
                minValue: 0,
                maxValue: 100,
                style: {
                    marginBottom: '10px'
                }
            }
        ];

        return items;
    },

    /**
     * Defines additional events which will be
     * fired from the component
     *
     * @return void
     */
    registerEvents: function() {
        this.addEvents(
            'openBadgeUrl',
            'openRegisterUrl'
        );
    }
});
//{/block}