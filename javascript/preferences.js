$(document).ready(function () {
    $('.change_password').click(function () {
        var form = $(this.form);
        $.ajax({
            type: "POST",
            url: "include/ajax/preferences.php",
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    alert("Password changed");
                } else {
                    alert(data.error);
                }
            }
        });
    });
    $('.change_preferences').click(function () {
        var form = $(this.form);
        $.ajax({
            type: "POST",
            url: "include/ajax/preferences.php?do=change_preferences",
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status === true) {
                    alert("Preferences changed");
                } else {
                    alert(data.error);
                }
            }
        });
    });
});