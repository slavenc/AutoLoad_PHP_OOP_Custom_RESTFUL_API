$(document).ready(function () {

    $.post("../../server/index.php", {action: 'load_brands.php'}, function (data) {
        data.forEach(function (brand) {
            $("#selectBrand").append('<option value=\x22' + brand.idBrand + '\x22>' + brand.brandName + '</option>');
        });
    });

    $("#search").click(function () {
        var idBrand = $("#selectBrand option:selected").val();
        var idModel = $("#selectModel option:selected").val();

        if (idBrand == 0 || idModel == 0) {
            alert('You must select brand or model');
        }

        $.get("../../server/index.php", {idBrand: idBrand, idModel: idModel, action: 'load_cars.php'}, function (data) {
            $("#searchResult").empty();
            data.forEach(function (carData) {
                console.log(carData);
                $("#searchResult").append('<span id=\x22' + carData.id + '\x22> Brand: ' + carData.brandName + ', Model: ' + carData.carModel + ',\n\
                    Year: ' + carData.year + ', Price: ' + carData.price + '</span><br>');
            });
        });
    });

    $("#selectBrand").click(function () {
        var idBrand = $("#selectBrand option:selected").val();

        $.get("../../server/index.php", {idBrand: idBrand, action: 'load_models.php'}, function (data) {
            $("#selectModel").empty();
            data.forEach(function (carModel) {
                $("#selectModel").append('<option value=\x22' + carModel.idModel + '\x22>' + carModel.modelName + '</option>');
            });
        });
    });

    $("#login").click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        $.post("../../server/web/index.php", {username: username, password: password, action: 'logIn'}, function (data) {
            console.log(data);
            if (data.succes == 'yes') {
                if (data.userType == 1) {
                    window.location = "admin_profile.php";
                } else if (data.userType == 2) {
                    window.location = "profile.php";
                }
            } else {
                $('#events').html(data.error);
            }
        });
    });

    $("#searchResult").delegate("span", "click", function () {
        var idCar = $(this).attr('id');

        $.get("../../server/index.php", {idCar: idCar, action: 'load_car_info.php'}, function (data) {
            $("#carData").append(
                    '<p>User: ' + data.user + '</p>' +
                    '<p>Surname: ' + data.surname + '</p>' +
                    '<p>Email: ' + data.email + '</p>' +
                    '<p>Brand: ' + data.brandName + '</p>' +
                    '<p>Model: ' + data.carModel + '</p>' +
                    '<p>Price: ' + data.price + '</p>' +
                    '<p>Description: ' + data.description + '</p>'

                    );
        });
    });
});
