<?php
if($_POST){
    if(isset($_POST['auth']) && isset($_POST['pass'])){
        if($_POST['pass'] == 'ok' && $_POST['auth']=='admin'){
            $_SESSION['auth']='ok';
            header('location: index.php');
        }
    }
}

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
        <input type="text" name="auth" required>
        <input type="text" name="pass" required>
        <button type="submit" id="Log in">Add</button>
    </form>
</div>