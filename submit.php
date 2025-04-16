<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $css = $_POST['css'] ?? '';

    // Optional: sanitize or validate CSS here
    $filename = 'submissions/' . date("Ymd_His") . '.css';
    file_put_contents($filename, $css);

    echo "CSS received and saved to $filename";
} else {
    echo "Invalid request";
}
