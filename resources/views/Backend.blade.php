<?php 
    session_start();
    header('location:index.html'); //redirect page (i.e. once they sign up they are redirected back to index/home page)
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($con, 'userdata');

    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $s = "select * from registration where userName = '$userName'";
    $r = "select * from registration where email = '$email'";

    $result = mysqli_query($con, $s);
    $result2 = mysqli_query($con, $r);

    $num = mysqli_num_rows($result);
    $num2 = mysqli_num_rows($result2);

    if($num==1 or $num2==1){
        echo "Username/email already taken, please try again with a different username/email.";
    }else{
        $reg = "insert into registration(userName, email, password) values('$userName', '$email', '$password')";
        mysqli_query($con, $reg);
        echo "Registration Successful! You may go back to sign in.";
    }
?>
