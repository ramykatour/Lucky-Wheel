<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['prize']) && isset($data['points'])) {
        $file = 'winning.txt';
        $current = file_get_contents($file);
        $current .= "User won: " . $data['prize'] . " with " . $data['points'] . " points\n";
        file_put_contents($file, $current);
        echo 'Success';
    } else {
        echo 'Invalid data';
    }
} else {
    echo 'Invalid request method';
}
?>
