<?php
$filename = "submissions.txt";

if (!file_exists($filename)) {
    echo "<p>No submissions yet.</p>";
    exit;
}

$contents = file_get_contents($filename);
$submissions = preg_split("/=== Submission at (.*?) ===/", $contents, -1, PREG_SPLIT_DELIM_CAPTURE);

for ($i = 1; $i < count($submissions); $i += 2) {
    $timestamp = trim($submissions[$i]);
    $entry = trim($submissions[$i + 1]);

    preg_match("/Code:\n(.*?)\nExplanation:\n(.*)/s", $entry, $matches);
    $code = $matches[1] ?? 'N/A';
    $explanation = $matches[2] ?? 'N/A';

    echo "<div class='card'>";
    echo "<div class='timestamp'>⏱️ Submitted at: <strong>$timestamp</strong></div>";
    echo "<h3>💻 Code:</h3><pre>" . htmlspecialchars($code) . "</pre>";
    echo "<h3>📝 Explanation:</h3><p>" . nl2br(htmlspecialchars($explanation)) . "</p>";
    echo "</div>";
}
?>
