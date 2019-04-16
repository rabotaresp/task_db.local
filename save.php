<?php
if ($_GET) {
    if (isset($_GET['task_m'])&& isset($_GET['task']) && isset($_GET['deadline_m'])&& isset($_GET['deadline'])) {
        $db = mysqli_connect('localhost', 'root', '', 'tasksdb');
        $myquery = "update tasksdb.tasks set Task = '".$_GET['task_m']."', Deadline ='".$_GET['deadline_m']."' where Task = '".$_GET['task']."' and Deadline ='".$_GET['deadline']."'";
        $res = mysqli_query($db, $myquery);
        mysqli_close($db);
    }
}
header('location: index.php');