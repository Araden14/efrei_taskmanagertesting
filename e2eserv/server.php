<?php
$host = '127.0.0.1';
$port = 3000;
$documentRoot = __DIR__;

$command = sprintf('php -S %s:%d -t %s', $host, $port, $documentRoot);

echo "Starting server on http://$host:$port\n";
echo "Press Ctrl+C to stop the server\n";

passthru($command);
?>
