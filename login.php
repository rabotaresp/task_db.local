<?php
session_start();
if($_POST){
    if(isset($_POST['login_user']) && isset($_POST['pass'])){
        $login = $_POST['login_user'];
        $password = $_POST['pass'];
        $db = mysqli_connect('localhost', 'root', '', 'tasksdb');
        $myquery = "SELECT Login, Password FROM users WHERE login = '" . $login . "' and password = '" . $password . "'";
        $res = mysqli_query($db, $myquery);
        if (mysqli_num_rows($res) == 1) {
            $_SESSION['login'] = $login;
            $id_u = mysqli_query($db, "select id from users where login = '" . $login . "' and password = '" . $password . "'");
            $_SESSION['id'] = implode('',mysqli_fetch_assoc($id_u));
            mysqli_close($db);
            header('location: index.php');
        }
        else {
            mysqli_close($db);
            header('location: registration.php');
        }
    }
}

//SESSION
//if($_POST){
//    if(isset($_POST['auth']) && isset($_POST['pass'])){
//        if($_POST['pass'] == 'ok' && $_POST['auth']=='admin'){
//            $_SESSION['auth']='ok';
//            header('location: index.php');
//        }
//    }
//}

//COOKIE
//if($_POST)
//{
//    if(isset($_POST['auth']) && isset($_POST['pass'])){
//        if($_POST['auth'] == 'admin' && $_POST['pass']== 'ok'){
//            setcookie('admin', 'ok');
//            header('location: index.php');
//        }
//    }
//}
?>

<div class="table">
    <form action="login.php" method="post">
        <input type="text" name="login_user" required>
        <input type="text" name="pass" required>
        <button type="submit" id="Log in">Add</button>
    </form>
</div>