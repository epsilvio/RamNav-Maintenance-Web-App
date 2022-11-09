<?php
    $command = escapeshellcmd('python /var/www/html/transcribe.py query.wav');
    $output = exec($command);
    echo $output;
?>