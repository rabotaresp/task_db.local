<?php
session_start();
if($_GET){
        if (isset($_GET['ind'])) {
            $index_delete = $_GET['ind'];
            $lines = explode('|', $index_delete);
            $db = mysqli_connect('localhost', 'root', '', 'tasksdb');
            $myquery = "delete from tasksdb.tasks where Task = '".$lines[0]."' and Deadline ='".$lines[1]."' and Id_Users = '".$_SESSION['id']."'";
            $res = mysqli_query($db, $myquery);
            mysqli_close($db);
    }
}
header('location: index.php');