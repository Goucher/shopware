//{namespace name=backend/trusted_shops/view/main}
//{block name="backend/trusted_shops/view/ratings"}
Ext.define('Shopware.apps.TrustedShops.view.main.Ratings', {
    extend: 'Ext.container.Container',
    alias: 'widget.trustedShops-main-ratings',

    /**
     * Contains all snippets for the component
     * @object
     */
    snippets: {
        trustedShopsShowRatingWidget: '{s name=ratings/trustedShopsShowRatingWidget}Show customer reviews widget{/s}',
        trustedShopsShowRatingsButtons: '{s name=ratings/trustedShopsShowRatingsButtons}Show rating buttons{/s}',
        trustedShopsShowRatingsButtonsHelpText: '{s name=ratings/trustedShopsShowRatingsButtonsHelpText}Show rating buttons for customers on checkout finish page{/s}',
        trustedShopsRatingLinkTitle: '{s name=ratings/trustedShopsRatingLinkTitle}<h1>Code examples for the links to the customer reviews which can be inserted into the e-mail templates</h1>{/s}',
        trustedShopsRateNow: '{s name=ratings/trustedShopsRateNow}<h3>Link for "Rate now"</h3><br>{/s}',
        trustedShopsRateLater: '{s name=ratings/trustedShopsRateLater}<br><br><br><br><h3>Link for "Rate later"</h3><br>{/s}',
        trustedShopsRateLaterDays: '{s name=ratings/trustedShopsRateLaterDays}Number of days for reminding{/s}',
        trustedShopsRateLaterDaysHelpText: '{s name=ratings/trustedShopsRateLaterDaysHelpText}Define the number of days after the customer gets reminded by Trusted Shops per e-mail to rate your shop when he clicks on "Rate later". Save your settings before copying the links.{/s}',
        languageStore: {
            german: '{s name=ratings/languageStore/german}German{/s}',
            english: '{s name=ratings/languageStore/english}English{/s}',
            spanish: '{s name=ratings/languageStore/spanish}Spanish{/s}',
            french: '{s name=ratings/languageStore/french}French{/s}',
            italian: '{s name=ratings/languageStore/italian}Italian{/s}',
            dutch: '{s name=ratings/languageStore/dutch}Dutch{/s}',
            polish: '{s name=ratings/languageStore/polish}Polish{/s}'
        },
        languageStoreLabel: '{s name=ratings/languageStoreLabel}Language of rating buttons{/s}',
        languageStoreHelpText: '{s name=ratings/languageStoreHelpText}Choose the language of the rating buttons, which should be displayed in your e-mail template. Save your settings before copying the links.{/s}',
        widthStoreLabel: '{s name=ratings/widthStoreLabel}Width of ratings buttons{/s}',
        widthStoreHelpText: '{s name=ratings/widthStoreHelpText}Choose the width (in px) of the rating buttons, which should be displayed in your e-mail template. Save your settings before copying the links.{/s}'
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
        var me = this,
            languageStore = Ext.create('Ext.data.Store', {
                fields: [
                    'languageCode',
                    'languageName'
                ],
                data: [
                    { 'languageCode': 'de', 'languageName': me.snippets.languageStore.german },
                    { 'languageCode': 'en', 'languageName': me.snippets.languageStore.english },
                    { 'languageCode': 'es', 'languageName': me.snippets.languageStore.spanish },
                    { 'languageCode': 'fr', 'languageName': me.snippets.languageStore.french },
                    { 'languageCode': 'it', 'languageName': me.snippets.languageStore.italian },
                    { 'languageCode': 'nl', 'languageName': me.snippets.languageStore.dutch },
                    { 'languageCode': 'pl', 'languageName': me.snippets.languageStore.polish }
                ]
            }),
            widthStore = Ext.create('Ext.data.Store', {
                fields: [
                    'pixel',
                    'pixelText'
                ],
                data: [
                    { 'pixel': 140, 'pixelText': '140px' },
                    { 'pixel': 150, 'pixelText': '150px' },
                    { 'pixel': 160, 'pixelText': '160px' },
                    { 'pixel': 170, 'pixelText': '170px' },
                    { 'pixel': 180, 'pixelText': '180px' },
                    { 'pixel': 190, 'pixelText': '190px' },
                    { 'pixel': 290, 'pixelText': '290px' }
                ]
            });

        var items = [
            {
                xtype: 'container',
                padding: 10,
                defaults: {
                    width: 340,
                    labelWidth: 200
                },
                items: [
                    {
                        xtype: 'checkbox',
                        name: 'trustedShopsShowRatingWidget',
                        uncheckedValue: 0,
                        inputValue: 1,
                        fieldLabel: me.snippets.trustedShopsShowRatingWidget
                    },
                    {
                        xtype: 'checkbox',
                        name: 'trustedShopsShowRatingsButtons',
                        uncheckedValue: 0,
                        inputValue: 1,
                        fieldLabel: me.snippets.trustedShopsShowRatingsButtons,
                        helpText: me.snippets.trustedShopsShowRatingsButtonsHelpText
                    },
                    {
                        xtype: 'numberfield',
                        name: 'trustedShopsRateLaterDays',
                        minValue: 1,
                        allowBlank: false,
                        fieldLabel: me.snippets.trustedShopsRateLaterDays,
                        helpText: me.snippets.trustedShopsRateLaterDaysHelpText
                    },
                    {
                        xtype: 'combobox',
                        name: 'trustedShopsLanguageRatingButtons',
                        store: languageStore,
                        displayField: 'languageName',
                        valueField: 'languageCode',
                        value: 'de',
                        queryMode: 'local',
                        fieldLabel: me.snippets.languageStoreLabel,
                        helpText: me.snippets.languageStoreHelpText,
                        forceSelection: true,
                        editable: false
                    },
                    {
                        xtype: 'combobox',
                        name: 'trustedShopsWidthRatingButtons',
                        store: widthStore,
                        displayField: 'pixelText',
                        valueField: 'pixel',
                        value: 140,
                        queryMode: 'local',
                        fieldLabel: me.snippets.widthStoreLabel,
                        helpText: me.snippets.widthStoreHelpText,
                        forceSelection: true,
                        editable: false
                    }
                ]
            },
            {
                xtype: 'container',
                padding: 10,
                layout: 'anchor',
                defaults: {
                    readOnly: true,
                    anchor: '100%'
                },
                items: [
                    {
                        xtype: 'displayfield',
                        value: me.snippets.trustedShopsRatingLinkTitle
                    },
                    {
                        xtype: 'displayfield',
                        value: me.snippets.trustedShopsRateNow
                    },
                    {
                        xtype: 'textarea',
                        name: 'ts-rate-now-link'
                    },
                    {
                        xtype: 'displayfield',
                        value: me.snippets.trustedShopsRateLater
                    },
                    {
                        xtype: 'textarea',
                        name: 'ts-rate-later-link'
                    }
                ]
            }
        ];

        return items;
    }
});
//{/block}