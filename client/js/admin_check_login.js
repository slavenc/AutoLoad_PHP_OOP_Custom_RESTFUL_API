$(function () {

    console.log('aasdkaskldlaskdlaslk');

    $.ajax({
        type: "POST",
        url: "../../server/index.php",
        data: {'action': 'check_login.php'}
    }).done(function (data) {
        if (data.succes == 'yes'  && data.userType == 1) {
           $("#userMessage").append('<p>' + data.userMessage + '</p>');
        } else if (data.succes == 'yes'  && data.userType == 2) {
            window.location = "profile.php";
        }
        else {
            window.location = "index.php";
        }
    });
});