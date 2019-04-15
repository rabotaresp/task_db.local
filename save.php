<?php
if ($_GET) {
    if (isset($_GET['inm'])) {
        $fw = fopen("save.txt", 'r');
        $count_read_line =0;
        $line = [];
        while ($read_line = fgets($fw)) {
            $line[]=trim($read_line);
        }
        fclose($fw);
        $line[$_GET['inm']] = $_GET['task'].'|'.$_GET['deadline'];
        $fw = fopen("save.txt", 'w');
        foreach ($line as $value) {
            fwrite($fw, $value.PHP_EOL);
        }
        fclose($fw);
    }
}
header('location: index.php');