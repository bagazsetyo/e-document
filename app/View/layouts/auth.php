<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        <?php echo isset($title) ? $title : 'E-Document'; ?>
    </title>

    <?php require_once __DIR__ . '/partials/head.php'; ?>
    <style>
    </style>
</head>

<body>
    <div id="app" style="height: 100vh;">
        <?= $content ?>
    </div>
</body>

</html>