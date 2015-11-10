//{namespace name=backend/trusted_shops/view/main}
//{block name="backend/trusted_shops/view/window"}
Ext.define('Shopware.apps.TrustedShops.view.main.Window', {
    extend: 'Enlight.app.Window',

    alias: 'widget.trustedShops-main-window',

    overflowY: 'scroll',

    /**
     * Contains all snippets for the component
     * @object
     */
    snippets: {
        saveButton: '{s name=save_button}Save{/s}',
        title: '{s name=window/title}Trusted Shops{/s}',
        chooseShop: '{s name=window/chooseShop}Choose shop{/s}',
        tab: {
            excellence: '{s name=window/tab/excellence}Excellence{/s}',
            ratings: '{s name=window/tab/ratings}Customer Reviews{/s}',
            badge: '{s name=window/tab/badge}Trustbadge{/s}'
        }
    },

    /**
     * Sets up the ui component
     * @return void
     */
    initComponent: function() {
        var me = this;

        me.title = me.snippets.title;

        var tabPanel = Ext.create('Ext.tab.Panel', {
            plain: false,
            items: [
                {
                    title: me.snippets.tab.badge,
                    xtype: 'trustedShops-main-badge'
                },
                {
                    title: me.snippets.tab.ratings,
                    xtype: 'trustedShops-main-ratings'
                },
                {
                    tabConfig: {
                        xtype: 'tbfill'
                    }
                },
                /*{if {acl_is_allowed privilege=read}}*/
                {
                    title: me.snippets.tab.excellence,
                    xtype: 'trustedShops-main-excellence'
                }
                /*{/if}*/
            ]
        });

        me.formPanel = Ext.create('Ext.form.Panel', {
            name: 'trusted-shops-form-panel',
            items: [tabPanel],
            border: false
        });

        me.dockedItems = [me.getTopToolbar()];
        me.dockedItems.push(me.getBottomToolbar());
        me.items = [me.formPanel];

        me.callParent(arguments);
    },

    /**
     * Defines additional events which will be
     * fired from the component
     *
     * @return void
     */
    registerEvents: function() {
        var me = this;

        me.addEvents(

            /**
             * @event changeShop
             * @param [int] shopId
             */
            'changeShop',

            /**
             * @event saveTrustedShops
             * @param [Ext.form.Panel] view
             */
            'saveTrustedShops'
        );
    },

    /**
     * Creates the grid toolbar with the shop picker
     *
     * @return [Ext.toolbar.Toolbar] grid toolbar
     */
    getTopToolbar: function() {
        var me = this;

        var shopStore = Ext.create('Shopware.apps.Base.store.Shop');

        shopStore.filters.clear();
        shopStore.load({
            callback: function(records) {
                shopCombo.setValue(records[0].get('id'));
            }
        });

        var shopCombo = Ext.create('Ext.form.field.ComboBox', {
            fieldLabel: me.snippets.chooseShop,
            store: shopStore,
            labelWidth: 80,
            name: 'shop-combo',
            margin: '3px 6px 3px 0',
            queryMode: 'local',
            valueField: 'id',
            editable: false,
            displayField: 'name',
            listeners: {
                'select': function() {
                    if (this.store.getAt('0')) {
                        me.fireEvent('changeShop');
                    }
                }
            }
        });

        var toolbar = Ext.create('Ext.toolbar.Toolbar', {
            dock: 'top',
            ui: 'shopware-ui',
            items: [
                '->',
                shopCombo
            ]
        });

        return toolbar;
    },

    /**
     * Creates buttons shown in form panel
     *
     * @return array
     */
    getBottomToolbar: function() {
        var me = this;

        return Ext.create('Ext.toolbar.Toolbar', {
            ui: 'shopware-ui',
            dock: 'bottom',
            cls: 'shopware-toolbar',
            items: [
                '->',
                /*{if {acl_is_allowed privilege=update}}*/
                {
                    text: me.snippets.saveButton,
                    action: 'save',
                    cls: 'primary',
                    formBind: true,
                    handler: function() {
                        me.fireEvent('saveTrustedShops');
                    }
                }
                /*{/if}*/
            ]
        });
    }
});
//{/block}