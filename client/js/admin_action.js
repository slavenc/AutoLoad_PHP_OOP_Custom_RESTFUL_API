$(function () {

    $("#addBrand").click(function () {
        var newBrand = $("#newBrand").val();
        $.post("../../server/index.php", {newBrand: newBrand, action: "auto_data.php"}, function (data) {
            $("#selectBrand").empty();
            data.forEach(function (brand) {
                $("#selectBrand").append('<option value=\x22' + brand.idBrand + '\x22>' + brand.brandName + '</option>');
            });
        });
    });

    $("#addModel").click(function () {
        var newModel = $("#newModel").val();
        var idBrand = $("#selectBrand option:selected").val();
        $.post("../../server/index.php", {newModel: newModel, idBrand: idBrand, action: "auto_data.php"}, function (data) {
            $("#newModel").val('');
        });
    });

    $("#getUsers").click(function () {
        $.get("../../server/index.php", {getUsers: true, action: "users.php"}, function (data) {
            $("#usersTable").empty();
            data.forEach(function (user) {
                var online;
                var style;
                if (user.online == 1) {
                    online = "ONLINE";
                    style = "style=\x22color:blue\x22 id=\x22";
                } else {
                    online = "OFFLINE";
                    style = "style=\x22color:red\x22 id=\x22";
                }
                    $("#usersTable").append('<tr ' + style + 'id=\x22tr' + user.uId + '\x22><td>' + user.uId + ', ' + user.username + ', ' + online + '</td><td><input type=\x22button\x22 id=\x22' + user.uId + '\x22 value=\x22Delete\x22></td></tr>');

            });
        });
    });

    $("#users").delegate("input", "click", function () {
        var id = $(this).attr('id');
        $.post("../../server/index.php", {deleteUser: true, idUser: id, action: "users.php"}, function (data) {
            if (data.succes == 'yes') {
                var trId = 'tr' + id;
                var tr = $("#" + trId);
                tr.remove();
            }
        });
    });

});


