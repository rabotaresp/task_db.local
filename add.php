<?php
if($_POST){
    if (isset($_POST['deadline']) && isset($_POST['task'])) {
        $g_task = $_POST['task'];
        $g_deadline = $_POST['deadline'];
        $s_user_id = $_SESSION['id'];
        $db = mysqli_connect('localhost', 'root', '', 'tasks');
        $query_user_id = "";
        $myquery = "insert into tasks_tb (task, deadline, user_id) value ('".$g_task."', '".$g_deadline."',  ".$s_user_id.")";
        $res = mysqli_query($db, $myquery);
        mysqli_close($db);
    }
}
header('location: index.php');