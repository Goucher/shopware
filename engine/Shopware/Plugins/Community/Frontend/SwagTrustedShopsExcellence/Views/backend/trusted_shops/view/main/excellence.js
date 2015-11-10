//{namespace name=backend/trusted_shops/view/main}
//{block name="backend/trusted_shops/view/excellence"}
Ext.define('Shopware.apps.TrustedShops.view.main.Excellence', {
    extend: 'Ext.container.Container',
    alias: 'widget.trustedShops-main-excellence',

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
        trustedShopsExcellenceHint: '{s name=excellence/trustedShopsExcellenceHint}If you have ordered Buyer Protection Excellence instead of Buyer Protection Classic (standard), you need to enter your credentials here.{/s}',
        trustedShopsUser: '{s name=excellence/trustedShopsUser}WS user{/s}',
        trustedShopsPassword: '{s name=excellence/trustedShopsPassword}WS password{/s}',
        trustedShopsTestSystem: '{s name=excellence/trustedShopsTestSystem}Activate test system{/s}',
        trustedShopsConnectionTest: '{s name=excellence/trustedShopsConnectionTest}Test connection, login and Trusted Shops certificate{/s}',
        trustedShopsImport: '{s name=excellence/trustedShopsImport}Import Trusted Shops items and rating image (Trusted Shops ID, webservice user name and password required){/s}'
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
                xtype: 'displayfield',
                value: me.snippets.trustedShopsExcellenceHint
            },
            {
                xtype: 'textfield',
                name: 'trustedShopsUser',
                fieldLabel: me.snippets.trustedShopsUser
            },
            {
                xtype: 'textfield',
                name: 'trustedShopsPassword',
                fieldLabel: me.snippets.trustedShopsPassword
            },
            {
                xtype: 'checkbox',
                name: 'trustedShopsTestSystem',
                uncheckedValue: 0,
                inputValue: 1,
                fieldLabel: me.snippets.trustedShopsTestSystem
            },
            {
                xtype: 'textfield',
                hidden: true,
                hideMode: 'visibility'
            },
            /*{if {acl_is_allowed privilege=update}}*/
            {
                xtype: 'button',
                name: 'trustedShopsConnectionTest',
                text: me.snippets.trustedShopsConnectionTest,
                cls: 'secondary small',
                style: {
                    marginBottom: '10px'
                },
                handler: function() {
                    me.fireEvent('connectionTest', me);
                }
            },
            {
                xtype: 'button',
                name: 'trustedShopsImport',
                text: me.snippets.trustedShopsImport,
                cls: 'secondary small',
                handler: function() {
                    me.fireEvent('import', me);
                }
            }
            /*{/if}*/
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
            'connectionTest',
            'import'
        );
    }
});
//{/block}