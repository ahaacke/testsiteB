<?php
$sent = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to      = 'test@example.com';
    $subject = 'Test from Site B';
    $body    = 'Sent at ' . date('Y-m-d H:i:s') . ' from Test Site B.';
    $headers = "From: siteB@devcontainer.local\r\nContent-Type: text/plain";

    if (mail($to, $subject, $body, $headers)) {
        $sent = true;
    } else {
        $error = 'mail() returned false — check SMTP config';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail Test — Site B</title>
    <style>
        body { font-family: sans-serif; background: #0d1117; color: #eee; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #161b22; border: 2px solid #3fb950; border-radius: 12px; padding: 2rem 3rem; max-width: 480px; width: 100%; }
        h1 { color: #3fb950; margin-top: 0; }
        .ok  { color: #b7e4c7; } .err { color: #ffb3c1; }
        button { background: #3fb950; color: #0d1117; border: none; padding: .6rem 1.4rem; border-radius: 6px; cursor: pointer; font-size: 1rem; font-weight: bold; }
        a { color: #3fb950; }
    </style>
</head>
<body>
<div class="card">
    <h1>📧 Mail Test — Site B</h1>
    <?php if ($sent): ?>
        <p class="ok">✓ Email sent — check <a href="http://<?= $_SERVER['HTTP_HOST'] ?>:8025" target="_blank">Mailpit</a></p>
    <?php elseif ($error): ?>
        <p class="err">✗ <?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <button type="submit">Send test email</button>
    </form>
    <p><a href="index.php">← Back</a></p>
</div>
</body>
</html>
