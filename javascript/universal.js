function change_page(pagename, subpage) {
    $("#content_container").html("");
    if (pagename != null) {
        var url = "include/ajax/pages.php?page=" + pagename;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    var page = "pages/" + data.pagename + ".php";
                    $("#content_container").load(page, {'url': false, 'step': subpage});
                } else {
                    $("#content_container").load('pages/front.php', {'url': false});
                }
            }
        });
    } else {
        $("#content_container").load('pages/front.php', {'url': false});
    }
}


function set_design_type() {
    $.ajax({
        type: "GET",
        url: "include/ajax/sensor.php",
        dataType: 'json',
        async: true,
        success: function (data) {
            var date = new Date();
            var minutes = 1;
            date.setTime(date.getTime() + (minutes * 60 * 1000));
            if (data.status === true) {
                $.cookie("design_type", data.daytime, { expires: date });
                $.cookie("default_design_type", data.daytime, { expires: 10 });
                if(data.daytime === true) {
                    if($('#cloud_style').attr("href") !== "css/clouds.css") {
                        $('body').fadeOut( function() {
                            $('#cloud_style').attr("href", "css/clouds.css");
                            $('#main_style').attr("href", "css/style.css");
                            $( this ).fadeIn();
                        } );
                    }
                } else {
                    if($('#cloud_style').attr("href") !== "css/clouds_dark.css") {
                        $('body').fadeOut( function() {
                            $('#cloud_style').attr("href", "css/clouds_dark.css");
                            $('#main_style').attr("href", "css/style_dark.css");
                            $( this ).fadeIn();
                        } );
                    }
                }
            }
        }
    });
}
$(function() {
    if($.cookie("design_type") == null) {
        set_design_type();
    }
});

$(document).ready(function () {
    $('.change_page').click(function () {
        event.preventDefault();
        var page = $(this).attr("page");
        var subpage = $(this).attr("subpage");
        change_page(page, subpage);
    });
});