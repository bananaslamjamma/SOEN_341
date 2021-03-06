<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>SOEN341 | Account</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>                  
    <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href='index'><img src="C:\Users\djamh\github\SOEN_341\public\images\home.png" width="20px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href='index'>Home</a></li>
                        <li><a href='account'>Account</a></li>
                    </ul>
                </nav>
                <img src="public/images/menu.png" class="menu-icon" onclick="menutoggle()">
           </div> 
        </div>
    
    <!--------- account details --------->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="public/images/login.jpg" width = "100%">
                </div>
                <div class="col">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="login()">Login</span>
                            <span onclick="register()">Sign Up</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm">
                            <input type="text" placeholder="Username" id="userName" name="userName">
                            <input type="password" placeholder="Password" id="password" name="password">
                            <button type="submit" class="btn">Login</button>
                            <a href="">Forgot Password</a>
                        </form>
                        <form id="RegForm" action="connect.php" method="post">
                            <input type="text" placeholder="Username" id="userName" name="userName">
                            <input type="email" placeholder="Email" id="email" name="email">
                            <input type="password" placeholder="Password" id="password" name="password">
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--------- javascript for toggle menu --------->
    
      <script>
        var MenuItems = document.getElementById("MenuItems");

            MenuItems.style.maxHeight = "0px";

            function menutoggle(){
                if(MenuItems.style.maxHeight == "0px")
                    {
                        MenuItems.style.maxHeight = "200px";
                    }
                else
                    {
                        MenuItems.style.maxHeight = "0px";
                    }
            }
        </script>
    <!--------- javascript for toggle form --------->    
    
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        
        function register(){
            RegForm.style.transform = "translateX(0px)";
            LoginForm.style.transform = "translateX(0px)";
            Indicator.style.transform = "translateX(100px)";
        }
        function login(){
            RegForm.style.transform = "translateX(300px)";
            LoginForm.style.transform = "translateX(300px)";
            Indicator.style.transform = "translateX(0px)";
        }
    </script>
</body>
</html>
