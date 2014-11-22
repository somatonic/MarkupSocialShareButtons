

/**
 * MarkupSocialShareButtons popup handler
 * ================================================================================
 *
 * Use this script to include in your site
 * This is not used by default, just here in case you like it
 * Required:
 * jquery core
 *
 */

$(function(){

    $(document).on("click", ".MarkupSocialShareButtons a", function(e){
        if($(this).parent().is("[class*=popup]")){
            e.preventDefault();
            var href = $(this).attr("href");
            popupHandler(href, e);
        }
    });


    // create popup
    function popupHandler(url, e) {

        var width = 500;
        var height = 500;

        e = (e ? e : window.event);
        // popup position
        var
            px = Math.floor(((screen.availWidth || 1024) - width) / 2),
            py = Math.floor(((screen.availHeight || 700) - height) / 2);

        // open popup
        var popup = window.open(url, "social",
            "width="+width+",height="+height+
            ",left="+px+",top="+py+
            ",location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1");
        if (popup) {
            popup.focus();
            if (e.preventDefault) e.preventDefault();
            e.returnValue = false;
        }

        return !!popup;
    }

});
