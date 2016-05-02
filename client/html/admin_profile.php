<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script src="../js/admin_check_login.js" type="text/javascript"></script>
        <script src="../js/log_out.js" type="text/javascript"></script>
        <script src="../js/profile.js" type="text/javascript"></script>
        <script src="../js/common/common.js" type="text/javascript"></script>
        <script src="../js/admin_action.js" type="text/javascript"></script>
    </head>
    <body>
        <h1>Admin Profle</h1>
        <button onclick="logOut()">Log out</button>
        <div id="message"></div>
        <input type="button" id="add" value="Add car"/>
        <div id="userMessage">
        </div>

        <input type="text" id="newBrand"><input type="button" id="addBrand" value="Add Brand"><br>

        <select id="selectBrand">
            <option value="0">Select Brand</option>
        </select>
        <input type="text" id="newModel"><input type="button" id="addModel" value="Add Model"><br>

        <input type="button" id="getUsers" value="Get users">
        <div id="users">
            <table id="usersTable">
            </table>
        </div>
    </body>
</html>