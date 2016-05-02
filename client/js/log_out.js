function logOut() {
    $.ajax({
        type: "POST",
        url: "../../server/web/index.php",
        data: {'action': 'logOut'}
    }).done(function (data) {
        if (data.succes == 'yes') {
            window.location = "index.php";
        } else {
            window.location = "profile.php";
        }
    });
}


