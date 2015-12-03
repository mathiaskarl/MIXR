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

$(document).ready(function () {
    $('.change_page').click(function () {
        var page = $(this).attr("page");
        var subpage = $(this).attr("subpage");
        change_page(page, subpage);
    });
});