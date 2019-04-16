<?php
//to connect DB "jdbc:mysql://[хост]:[порт]/[бд]?useUnicode=true&useJDBCCompliantTimezoneShift=true&useLegacyDatetimeCode=false&serverTimezone=UTC"
$t_index = 0;
$m_index= 0;
session_start();
if(!isset($_SESSION['login'])){
    header('location: login.php');
}
$db = mysqli_connect('localhost', 'root', '', 'tasksdb');
$myquery = "select task, deadline from tasksdb.tasks where Id_Users = '".$_SESSION['id']."'";
$res = mysqli_query($db, $myquery);
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
<!--    <script src="js/add.js"></script>-->
    <title>TaskTabl</title>
</head>
<body>
<div class="lableText">
    <label>Hi, <?=$_SESSION['login'] ?></label>
    <form action="login.php" method="post">
        <button type="submit">Log out</button>
    </form>
</div>
<div class="table">
    <form action="add.php" method="post">
        <input id="task_add" type="text" name="task" required>
        <input id="deadline_add" type="date" name="deadline" value="<?=date('Y:m:d\Tm:i', time())?>" required>
        <button type="submit" id="btn_add">Add</button>
    </form>
</div>
<table id="tab" class="table" >
    <thead>
    <tr>
        <th scope="col">Task</th>
        <th scope="col">Deadline</th>
        <th scope="col">Button Done</th>
        <th scope="col">Button Modify</th>
    </tr>
    </thead>
    <tbody>
    <?
    while($row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
            <td><?= $row['task'] ?></td>
            <td><?= $row['deadline'] ?></td>
            <td><a href="delete.php?ind=<?= $row['task'].'|'.$row['deadline']?>"> Done</a></td>
            <td><a href="modify.php?inm=<?= $row['task'].'|'.$row['deadline']?>"> Modify</a></td>
        </tr>
    <? }mysqli_close($db); ?>

    </tbody>
</table>
</body>
</html>