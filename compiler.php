<?php

$code = file_get_contents('php://input');

$descriptorspec = array(
    0 => ['pipe', 'r'],
    1 => ['pipe', 'w'],
    2 => ['file', '/tmp/error-output.txt', 'a']
);

$process = proc_open('dot -Tsvg', $descriptorspec, $pipes);

if (is_resource($process)) {
    fwrite($pipes[0], "digraph G { {$code} }");
    fclose($pipes[0]);

    header('Content-Type: image/svg+xml');

    echo stream_get_contents($pipes[1]);

    fclose($pipes[1]);

    $return_value = proc_close($process);
}
