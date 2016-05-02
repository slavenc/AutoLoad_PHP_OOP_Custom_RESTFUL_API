<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/index.css">
        <script src="http://code.jquery.com/jquery-1.5.js"></script>
        <script src="../js/index.js" type="text/javascript"></script>
    </head>
    <body>
        <b>Username</b>
        <input type="text" name="username" id="username"><br />
        <b>Password</b>
        <input type="text" name="password" id="password"><br />
        <input type="button" id="login" value="Login" /><input type="button" id="login" value="Login as adminstrato" /><br>
        <a href="register.php">
            <button>Sign up</button>
        </a>

        <!--  ** SEARCH DIV **  -->
        <div id="searchDiv">
            <table id="searchTable">
                <tr>
                    <td>
                        <select id="selectBrand">
                            <option value="0">Select Brand</option>
                        </select>
                    </td>
                    <td>
                        <select id="selectModel">
                            <option value="0">Select Model</option>
                        </select>
                    </td>
                    <td>
                        <input type="button" id="search" value="Search" />
                    </td> 
                </tr>
            </table>

        </div>

        <!--  ** SEARCH RESULT **  -->
        <div id="searchResult"></div>
        
        <!--  ** CAR INFO **  -->
        <div id="carData"></div>
        
        

    </body>
</html>
