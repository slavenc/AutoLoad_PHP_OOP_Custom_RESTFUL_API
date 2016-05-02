$(function () {

    console.log('aasdkaskldlaskdlaslk');

    $.ajax({
        type: "POST",
        url: "../../server/web/index.php",
        data: {'action': 'checkLogin'}
    }).done(function (data) {
        if (data.succes == 'yes') {
           $("#userMessage").append('<p>' + data.userMessage + '</p>');
        } else {
            window.location = "index.php";
        }
    });
});





