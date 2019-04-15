<?php
if ($_GET) {
    if (isset($_GET['inm'])) {
        $fw = fopen("save.txt", 'r');
        for ($i = 0; $i < $_GET['inm']; $i++) {
            fgets($fw);
        }
        $m_line = fgets($fw);
        $lines = explode('|', $m_line);
    }

}
?>
<div class="table">
    <form action="save.php" method="get">
        <input type="hidden" name="inm" value="<?= $_GET['inm'] ?>">
        <input type="text" name="task" value="<?= $lines[0] ?>">
        <input type="text" name="deadline" value="<?= $lines[1] ?>">
        <button type="submit">Save</button>
    </form>
</div>