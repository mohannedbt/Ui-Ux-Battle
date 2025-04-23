<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $code = $_POST['code'] ?? '';
    $explanation = $_POST['explanation'] ?? '';
    $timestamp = date("Y-m-d H:i:s");

    // Save to a file (you can replace with database logic)
    $entry = "=== Submission at $timestamp ===\n";
    $entry .= "Code:\n$code\n";
    $entry .= "Explanation:\n$explanation\n\n";
    file_put_contents("submissions.txt", $entry, FILE_APPEND);

    echo "Submission received!";
} else {
    http_response_code(405);
    echo "Method not allowed";
}
?>
