$(function () {

    console.log('aasdkaskldlaskdlaslk');

    $("#regForm").submit(function (e) {

        e.preventDefault();

        var email = $('#email').val();
        var username = $('#username').val();
        var name = $('#name').val();
        var surname = $('#surname').val();
        var password = $('#password').val();

        $.post("../../server/web/index.php", {email: email, username: username, name: name, surname: surname, password: password, action: 'register'}, function (data) {
            if (data.succes == 'yes') {
                window.location = "profile.php";
            } else {
                $('#errorMsg').html(data.error);
            }
        });
        
        console.log('necu lajat');

    });
});


