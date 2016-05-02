<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="http://code.jquery.com/jquery-1.5.js"></script>
        <script src="../js/register.js" type="text/javascript"></script>
    </head>
    <body>
        <form id="regForm" method="post" action="#">
            <fieldset>
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
                <input type="submit" id="submit" value="Submit" />
            </fieldset>
              
        </form>  
      <div id="errorMsg"></div>
    </body>
</html>
