function set_playlist(artist_id) {
    $('#playlist_container').empty();
    if(artist_id != null) {
        $("#playlist_container").load('include/ajax/playlists.php', {'artist_id': artist_id});
    } else {
        $("#playlist_container").load('include/ajax/playlists.php');
    }
}
    
$(document).ready(function () {
    function replace(data) {
        $('#songname').empty().append(data.songname);
        $('#filename').empty().append(data.filepath);
        $('#artist').empty().append(data.artist);
        $('#album').empty().append(data.album);
        $('.song_id').attr("value", data.id);
        $('.artist_id').attr("value", data.artist_id);
        
        
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
    
    $('.get_artist_songs').click(function () {
        var artist_id = $(this).attr("artistid");
        var artist_assigned = (artist_id != null && artist_id > 0);
        if(artist_assigned === true) {
            set_playlist(artist_id);
        } else {
            alert("An error occoured");
        }
    });
    
    $('.back_to_user_playlist').click(function() {
        set_playlist();
    });
    
    
    $('.play_by_id').click(function () {
        var form = $(this.form).serializeArray();
        var song_id = $(this).attr("songid");
        var song_assigned = (song_id != null && song_id > 0);
        if(song_assigned === true) {
            form = form.concat([
                {name: "song_id", value: song_id}
            ]);
        }
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php?do=play_by_id",
            data: form,
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
    
    $('.discover_by_artist').click(function () {
        var form = $(this.form);
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php?do=discover_by_artist",
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
        var form = $(this.form).serializeArray();
        var song_id = $(this).attr("songid");
        var song_assigned = (song_id != null && song_id > 0);
        if(song_assigned === true) {
            form = form.concat([
                {name: "song_id", value: song_id}
            ]);
        }
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php?do=add",
            data: form,
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
        var form = $(this.form).serializeArray();
        var song_id = $(this).attr("songid");
        var song_assigned = (song_id != null && song_id > 0);
        if(song_assigned === true) {
            form = form.concat([
                {name: "song_id", value: song_id}
            ]);
        }
        $.ajax({
            type: "POST",
            url: "include/ajax/player.php?do=remove",
            data: form,
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    if(song_assigned === true) {
                        var tr = "tr[songid="+song_id+"]";
                        $(tr).remove();
                        $('#playlisttable').trigger('update');
                    } else {
                        alert("test - Removed from playlist");
                    }
                } else {
                    alert(data.error);
                }
            }
        });
    });
});