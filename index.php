<?php
$db_ok = false;
$db_error = '';
try {
    $pdo = new PDO(
        'mysql:host=' . getenv('MYSQL_HOST') . ';dbname=' . 'devdb',
        'devuser', 'devpassword'
    );
    $db_ok = true;
} catch (Exception $e) {
    $db_error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test Site B</title>
    <style>
        body { font-family: sans-serif; background: #0d1117; color: #eee; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .card { background: #161b22; border: 2px solid #3fb950; border-radius: 12px; padding: 2rem 3rem; max-width: 480px; width: 100%; }
        h1 { color: #3fb950; margin-top: 0; }
        .badge { display: inline-block; padding: .3rem .8rem; border-radius: 4px; font-size: .85rem; font-weight: bold; }
        .ok  { background: #2d6a4f; color: #b7e4c7; }
        .err { background: #6b2737; color: #ffb3c1; }
        a { color: #3fb950; }
    </style>
</head>
<body>
<div class="card">
    <h1>🅱 Test Site B</h1>
    <p>PHP <?= PHP_VERSION ?> &nbsp;|&nbsp; <?= date('H:i:s') ?></p>
    <p>
        DB:
        <?php if ($db_ok): ?>
            <span class="badge ok">connected</span>
        <?php else: ?>
            <span class="badge err">failed: <?= htmlspecialchars($db_error) ?></span>
        <?php endif; ?>
    </p>
    <p><a href="mail-test.php">→ Test email sending</a></p>
</div>
</body>
</html>
