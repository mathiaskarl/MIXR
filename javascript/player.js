$(document).ready(function () {
    function replace(data) {
        $('#songname').empty().append(data.songname);
        $('#filename').empty().append(data.filepath);
        $('#artist').empty().append(data.artist);
        $('#album').empty().append(data.album);
        $('.song_id').attr("value", data.id);
        
        var musicPath = "music/" + data.filepath;
        var audio = $("#player");
        $("#music").attr("src", musicPath);
        audio[0].pause();
        audio[0].load();
        audio[0].oncanplaythrough = audio[0].play();
    }
    
    $('.discover').click(function () {
        var form = $(this.form);
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php?do=discover",
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    replace(data);
                } else {
                    alert(data.error);
                }
            }
        });
    });
    
    $('.playfromlist').click(function () {
        var form = $(this.form);
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php",
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    replace(data);
                } else {
                    alert(data.error);
                }
            }
        });
    });
    
    $('.addtolist').click(function () {
        var form = $(this.form);
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php?do=add",
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    alert("test - Added to playlist");
                } else {
                    alert(data.error);
                }
            }
        });
    });
    
    $('.removefromlist').click(function () {
        var form = $(this.form);
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php?do=remove",
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    alert("test - Removed from playlist");
                } else {
                    alert(data.error);
                }
            }
        });
    });
});