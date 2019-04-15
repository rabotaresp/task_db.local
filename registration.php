<?php
if($_POST){
    if(isset($_POST['name']) && isset($_POST['login']) && isset($_POST['pass'])){
        $name = $_POST['name'];
        $login = $_POST['login'];
        $password = $_POST['pass'];
        $_SESSION['login'] = $login;
        $db = mysqli_connect('localhost', 'root', '', 'tasks');
        $myquery = "insert into users(Name, Login, Password) value ('".$name."', '".$login."','".$password."')";
        $res = mysqli_query($db, $myquery);
        if(mysqli_errno($db)== 0)
        {
            $error = 'Success login';
            header('location: index.php');

        }
    }
}
?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="css/style.css">
</head>
</head>
<div >
    <form action="registration.php" method="post">
        <label class="regform">* enter your name</label>
        <input type="text" name="name" class="regform">
        <label class="regform" >* enter your login</label>
        <input type="text" name="login" class="regform">
        <label class="regform">* enter password</label>
        <input type="text" name="pass" class="regform">
        <button type="submit" id="registr" class="regform">Registration</button>
    </form>
    <label><?=$error?></label>
</div>
</html>