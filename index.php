<?php
$t_index = 0;
$m_index= 0;

session_start();
var_dump($_SESSION['login']);
if(isset($_SESSION['login']) && $_SESSION['login'] = $_POST['login']){
    header('location: registration.php');
}
session_destroy();
session_abort();
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
<div class="table">
    <form action="add.php" method="get">
        <input id="task_add" type="text" name="task" required>
        <input id="deadline_add" type="text" name="deadline" required>
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
    $r_line = file("save.txt");
    $line = [];
    foreach ($r_line as $value) {
        $line[] = explode('|', $value);
    }
    foreach ($line as $value) {
        ?>
        <tr>
            <td><?= $value[0] ?></td>
            <td><?= $value[1] ?></td>
            <td><a href="delete.php?ind=<?= $t_index++ ?>"> Done</a></td>
            <td><a href="modify.php?inm=<?= $m_index++ ?>"> Modify</a></td>
        </tr>
    <? } ?>

    </tbody>
</table>
</body>
</html>