<?php
if ($_GET) {
    if (isset($_GET['inm'])) {
        $index_modify = $_GET['inm'];
        $lines = explode('|', $index_modify);
        $lines_m = explode('|', $index_modify);
    }
}
?>
<div class="table">
    <form action="save.php" method="get">
        <input type="text" name="task_m" value="<?= $lines_m[0] ?>">
        <input hidden type="text" name="task" value="<?= $lines[0] ?>">
        <input type="text" name="deadline_m" value="<?= $lines_m[1]  ?>">
        <input hidden type="text" name="deadline" value="<?= $lines[1] ?>">
        <button type="submit">Save</button>
    </form>
</div>