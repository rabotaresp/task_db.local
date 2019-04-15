<?php
if ($_GET) {
    if (isset($_GET['ind'])) {
        $fw = fopen("save.txt", 'r');
        $count_del_ind = 0;
        $line = [];
        while ($read_line = fgets($fw)) {
            if ($count_del_ind != $_GET['ind']) {
                    $line[] = $read_line;
            }
            $count_del_ind++;
        }
        fclose($fw);
        $fw = fopen("save.txt", 'w');
        foreach ($line as $value) {
            if ($value != null) {
                fwrite($fw, $value);
            }
        }
        fclose($fw);
    }
}
header('location: index.php');