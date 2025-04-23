<!DOCTYPE html>
<html>
<head>
  <title>Live Dashboard - Bug Hunt</title>
  <style>
    body { font-family: Arial; max-width: 900px; margin: auto; }
    .card { border: 1px solid #ccc; padding: 10px; margin: 15px 0; background: #f9f9f9; border-radius: 8px; }
    pre { background: #eee; padding: 10px; overflow-x: auto; }
    .timestamp { color: #555; font-size: 14px; }
  </style>
</head>
<body>
  <h1>📡 Live Submissions Dashboard</h1>
  <div id="submission-list">Loading...</div>

  <script>
    async function loadSubmissions() {
      try {
        const res = await fetch("get_submissions.php");
        const html = await res.text();
        document.getElementById("submission-list").innerHTML = html;
      } catch (err) {
        document.getElementById("submission-list").innerHTML = "❌ Failed to load submissions.";
      }
    }

    loadSubmissions();
    setInterval(loadSubmissions, 10000); // Refresh every 10 seconds
  </script>
</body>
</html>
