//{namespace name=backend/trusted_shops/controller/main}
//{block name="backend/trusted_shops/controller/main"}
Ext.define('Shopware.apps.TrustedShops.controller.Main', {
    extend: 'Enlight.app.Controller',

    /**
     * Set component references for easy access
     * @array
     */
    refs: [
        { ref: 'tsMainForm', selector: 'trustedShops-main-window form[name=trusted-shops-form-panel]' },
        { ref: 'shopCombo', selector: 'trustedShops-main-window field[name=shop-combo]' },
        { ref: 'tsRateNowLink', selector: 'trustedShops-main-window field[name=ts-rate-now-link]' },
        { ref: 'tsRateLaterLink', selector: 'trustedShops-main-window field[name=ts-rate-later-link]' },
		{ ref: 'tsBadgeTabTSID', selector: 'trustedShops-main-badge field[name=trustedShopsId]' },
		{ ref: 'tsBadgeTabCode', selector: 'trustedShops-main-badge field[name=trustedShopsTrustBadgeCode]' },
		{ ref: 'tsExcellenceUser', selector: 'trustedShops-main-excellence field[name=trustedShopsUser]' },
		{ ref: 'tsExcellencePassword', selector: 'trustedShops-main-excellence field[name=trustedShopsPassword]' }
    ],

    snippets: {
        onSaveTitle: '{s name=controller/onSaveTitle}Saved{/s}',
        onSaveText: '{s name=controller/onSaveText}Configuration was saved.{/s}',
        trustedShopsConnectionTestMsg: '{s name=controller/trustedShopsConnectionTestMsg}Trusted Shops connection test{/s}',
        trustedShopsImportMsg: '{s name=controller/trustedShopsImportMsg}Trusted Shops import{/s}',
        trustedShopsErrorWarning: '{s name=controller/trustedShopsErrorWarning}Attention!{/s}',
        trustedShopsErrorText: '{s name=controller/trustedShopsErrorText}An unknown error occurs{/s}'
    },

    rateNowTpl: '{literal}<a href="https://www.trustedshops.com/buyerrating/rate_[0].html&buyerEmail={$additional.user.email|base64_encode|urlencode}&shopOrderID={$sOrderNumber|base64_encode|urlencode}" target="_blank"><img src="{link file=\'frontend/_resources/images/rating_buttons/[1]/rate_now_[2]_[3].png\' fullPath}"></a>{/literal}',
    rateLaterTpl: '{literal}<a href="http://www.trustedshops.com/reviews/rateshoplater.php?shop_id=[0]&buyerEmail={$additional.user.email|base64_encode|urlencode}&shopOrderID={$sOrderNumber|base64_encode|urlencode}&days=[1]" target="_blank"><img src="{link file=\'frontend/_resources/images/rating_buttons/[2]/rate_later_[3]_[4].png\' fullPath}"></a>{/literal}',

    init: function() {
        var me = this;

        me.mainWindow = me.getView('main.Window').create({}).show();

        me.loadRecord();

        me.control({
            'trustedShops-main-window': {
                changeShop: me.onChangeShop,
                saveTrustedShops: me.onSaveTrustedShops
            },
            'trustedShops-main-excellence': {
                connectionTest: me.onConnectionTest,
                import: me.onImport
            },
            'trustedShops-main-badge': {
                openBadgeUrl: me.onOpenBadgeUrl,
                openRegisterUrl: me.onOpenRegisterUrl
            }
        })
    },

    loadRecord: function() {
        var me = this,
            shopId = me.getShopCombo().getValue(),
            store = Ext.create('Shopware.apps.TrustedShops.store.TrustedShops'),
            formPanel = me.mainWindow.formPanel,
            record;

        if (!shopId) {
            shopId = 1;
        }

        store.getProxy().extraParams.shopId = shopId;

        store.load({
            callback: function() {
                record = store.getById(shopId);
                formPanel.setLoading(true);
                setTimeout(function() {
                    formPanel.setLoading(false);
                }, 250);

                me.loadRecordIntoView(record);
            }
        });
    },

    loadRecordIntoView: function(record) {
        var me = this,
            trustedShopId = record.get('trustedShopsId') ? record.get('trustedShopsId') : record.get('emptyId'),
            rateNowLink = Ext.String.format(me.rateNowTpl, trustedShopId, record.get('trustedShopsLanguageRatingButtons'), record.get('trustedShopsLanguageRatingButtons'), record.get('trustedShopsWidthRatingButtons')),
            rateLaterLink = Ext.String.format(me.rateLaterTpl, trustedShopId, record.get('trustedShopsRateLaterDays'), record.get('trustedShopsLanguageRatingButtons'), record.get('trustedShopsLanguageRatingButtons'), record.get('trustedShopsWidthRatingButtons'));

        me.getTsMainForm().loadRecord(record);
        me.getTsRateNowLink().setValue(rateNowLink);
        me.getTsRateLaterLink().setValue(rateLaterLink);

        if (record.get('emptyId')) {
            me.getTsBadgeTabTSID().emptyText = record.get('emptyId');
            me.getTsBadgeTabTSID().applyEmptyText();
        }
        if (record.get('emptyUser')) {
            me.getTsExcellenceUser().emptyText = record.get('emptyUser');
            me.getTsExcellenceUser().applyEmptyText();
        }
        if (record.get('emptyPassword')) {
            me.getTsExcellencePassword().emptyText = record.get('emptyPassword');
            me.getTsExcellencePassword().applyEmptyText();
        }
    },

    onChangeShop: function() {
        this.loadRecord();
    },

    onSaveTrustedShops: function() {
        var me = this;

        me.saveConfiguration();
    },

    saveConfiguration: function(callback) {
        var me = this,
            view = me.getTsMainForm(),
            form = view.getForm(),
            record = form.getRecord();

        callback = callback || Ext.emptyFn;

        if (!form.isValid()) {
            return;
        }

        form.updateRecord(record);

        view.setLoading(true);
        record.save({
            callback: function() {
                view.setLoading(false);
                me.loadRecordIntoView(record);
                Shopware.Notification.createGrowlMessage(me.snippets.onSaveTitle, me.snippets.onSaveText);

                if (Ext.isFunction(callback)) {
                    callback();
                }
            }
        });
    },

    onConnectionTest: function() {
        var me = this,
            shopId = me.getShopCombo().getValue(),
            jsonResponse;

        me.saveConfiguration(function() {
            Ext.Ajax.request({
                scope: this,
                url: window.location.pathname + 'TrustedShops/connectionTest',
                params: {
                    shopId: shopId
                },
                success: function(result) {
                    jsonResponse = Ext.JSON.decode(result.responseText);
                    Shopware.Notification.createGrowlMessage(me.snippets.trustedShopsConnectionTestMsg, jsonResponse.message);
                },
                failure: function() {
                    Shopware.Notification.createGrowlMessage(me.snippets.trustedShopsErrorWarning, me.snippets.trustedShopsErrorText);
                }
            });
        });
    },

    onImport: function() {
        var me = this,
            shopId = me.getShopCombo().getValue(),
            jsonResponse;

        me.saveConfiguration(function() {
            Ext.Ajax.request({
                scope: this,
                url: window.location.pathname + 'TrustedShops/importBuyerProtectionItems',
                params: {
                    shopId: shopId
                },
                success: function(result) {
                    jsonResponse = Ext.JSON.decode(result.responseText);
                    Shopware.Notification.createGrowlMessage(me.snippets.trustedShopsImportMsg, jsonResponse.message);
                },
                failure: function() {
                    Shopware.Notification.createGrowlMessage(me.snippets.trustedShopsErrorWarning, me.snippets.trustedShopsErrorText);
                }
            });
        });
    },

    onOpenBadgeUrl: function() {
        var me = this;

        me.saveConfiguration(function() {
            me.openBadge();
        });
    },

    openBadge: function() {
        var me = this,
            record = me.getTsMainForm().getForm().getRecord(),
            tsId = record.get('trustedShopsId'),
            backendLanguage = record.get('trustedShopsBackendLanguage'),
            shopwareVersion = '{Shopware::VERSION}',
            pluginVersion = '2.0.0';

        window.open('https://www.trustedshops.com/integration/?shop_id=' + tsId + '&backend_language=' + backendLanguage + '&shopsw=shopware&shopsw_version=' + shopwareVersion + '&plugin_version=' + pluginVersion + '&context=trustbadge', '_blank');
    },

    onOpenRegisterUrl: function() {
        var me = this,
            record = me.getTsMainForm().getForm().getRecord(),
            backendLanguage = record.get('trustedShopsBackendLanguage');

        if (backendLanguage == 'de') {
            window.open('https://www.trustedshops.de/shopbetreiber/?et_cid=14&et_lid=29818', '_blank');
        } else if (backendLanguage == 'es') {
            window.open('https://www.trustedshops.es/comerciante/partner/?et_cid=14&et_lid=29818', '_blank');
        } else if (backendLanguage == 'fr') {
            window.open('https://www.trustedshops.fr/marchands/partenaires/?et_cid=14&et_lid=29818', '_blank');
        } else if (backendLanguage == 'pl') {
            window.open('https://www.trustedshops.pl/handlowcy/partner/?et_cid=14&et_lid=29818', '_blank');
        } else {
            window.open('https://www.trustedshops.co.uk/merchants/partners/?et_cid=14&et_lid=29818', '_blank');
        }
    }
});
//{/block}