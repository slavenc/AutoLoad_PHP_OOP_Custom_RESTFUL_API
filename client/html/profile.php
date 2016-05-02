<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
        <script src="../js/check_login.js" type="text/javascript"></script>
        <script src="../js/log_out.js" type="text/javascript"></script>
        <script src="../js/profile.js" type="text/javascript"></script>
    </head>
    <body>
        <button onclick="logOut()">Log out</button>
        <button id="editProfile">Edit profile</button>
        <div id="addCar">
            <form class="form" action="#" id="addCarForm">
                <h3>Add new car</h3>
                <label>Brand: <span>*</span></label><br>
                <input type="text" id="brand" placeholder="Brand"/><br>
                <label>Model: <span>*</span></label><br>
                <input type="text" id="model" placeholder="Model"/><br>
                <label>Year <span>*</span></label><br>
                <label>Price</label><br>
                <input type="text" id="price" placeholder="Price"/><br>
                <input type="button" id="send" value="Send"/>
                <input type="button" id="cancel" value="Cancel"/>
                <br/>
            </form>
        </div>
        <div id="message"></div>
        <input type="button" id="add" value="Add car"/>

        <div id="userInfo">
            <legend>Register Form</legend><br />
            <b>Name</b> 
            <input type="text" name="name" id="name"><br />
            <b>Surname</b>
            <input type="text" name="surname" id="surname"><br />
            <b>Email</b>
            <input type="text" name="email" id="email"><br />
            <b>Username</b>
            <input type="text" name="username" id="username"><br />
            <b>Password</b>
            <input type="text" name="password" id="password"><br />
            <input type="button" id="updateProfile" value="Update"/>
            <input type="button" id="cancelInfo" value="Cancel"/>
        </div>

        <div ></div>
    </body>
</html>
