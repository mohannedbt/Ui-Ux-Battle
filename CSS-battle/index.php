<?php
// Set the countdown target date and time
date_default_timezone_set("Africa/Tunis");
$targetDateStr = "2025-04-16 15:31:20";
$targetDate = strtotime($targetDateStr);
$currentTime = time();
$remainingTime = $targetDate - $currentTime;

// Check if countdown is already over
$isExpired = $remainingTime <= 0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Countdown Timer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 100px;
        }
        #demo {
            font-size: 30px;
            color: #333;
        }
    </style>
</head>
<body>

<h1>Event Countdown</h1>

<?php if ($isExpired): ?>
    <button id="demo">go to page</button>
<?php else: ?>
    <p id="demo">Loading countdown...</p>

    <script>
        // Target timestamp from PHP
        const countDownDate = <?= $targetDate * 1000 ?>;

        const countdown = setInterval(function () {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById("demo").innerHTML =
                    days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
            } else {
                clearInterval(countdown);
                document.getElementById("demo").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
<?php endif; ?>

</body>
</html>
