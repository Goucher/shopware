$(function() {
    var footerMenu = $('#footer div.footer_menu'),
        footerDiv = footerMenu.children('.footer_column.col1'),
        tsData = $('#trustedShopsDataForWidget'),
        href = tsData.children('#href').text(),
        title = tsData.children('#title').text(),
        imgSrc = tsData.children('#imgSrc').text();

    if (tsData[0]) {
        footerMenu.height(footerMenu.height() + 110);
        footerDiv.append('<div class="ts-user-votes"><a target="_blank" href="' + href + '" title="' + title + '"><img src="' + imgSrc + '" id="tsWidgetImage"></a></div>');
    }

    $('#tsWidgetImage').load(function() {
        if ($(this).height() <= 1) {
            footerMenu.height(footerMenu.height() - 110);
        }
    });
});