$(document).ready(function () {
    //setTimeout(popup, 3000);
    //function popup() {
    $("#addCar").css("display", "none");

    $("#userInfo").css("display", "none");
    //}
    $("#addCarForm #cancel").click(function () {
        $(this).parent().parent().delay(800).fadeOut(600);
    });

    $('#year').datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: 'MM yy',
        onClose: function (dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
// Contact form popup send-button click event.
    $("#addCarForm #send").click(function () {
        var brand = $("#brand").val();
        var model = $("#model").val();
        var year = $("#yea 2 1r").val();
        var price = $("#price").val();
        $.post("../../server/index.php", {brand: brand, model: model, year: year, price: price, action: 'add_car.php'}, function (data) {
            if (data.succes == 'yes') {
                $('#message').html(data.message);
                $(this).parent().parent().hide();
            } else {
                $('#message').html(data.error);
            }
        }
        );
        $(this).parent().parent().hide();
    });

    $("#add").click(function () {
        $("#addCar").css("display", "block");
    });

    $("#editProfile").click(function () {
        $("#userInfo").css("display", "block");
        $.get("../../server/web/index.php", {method: "get_user_info", action: 'getUserInfo'}, function (data) {
            $("#name").val(data.name);
            $("#surname").val(data.surname);
            $("#username").val(data.username);
            $("#email").val(data.email);
            $("#password").val(data.password);
        });
    });

    $("#updateProfile").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        var name = $("#name").val();
        var surname = $("#surname").val();
        var email = $("#email").val();
        $.post("../../server/index.php", {
            name: name, username: username, password: password, surname: surname, email: email, method: "update_user_info", action: 'user_info.php'}, function (data) {
            $("#userInfo").css("display", "none");
        });
    });

    $("#cancelInfo").click(function () {
        $("#userInfo").css("display", "none");
    });
});