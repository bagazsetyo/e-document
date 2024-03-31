<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        <?php echo isset($title) ? $title : 'E-Document'; ?>
    </title>

    <?php require_once __DIR__ . '/partials/head.php'; ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <?php require_once __DIR__ . '/partials/navbar.php'; ?>
            <?php require_once __DIR__ . '/partials/sidebar.php'; ?>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>
                            <?php echo isset($title) ? $title : ''; ?>
                        </h1>
                    </div>

                    <div class="section-body">
                        <?php echo isset($content) ? $content : ''; ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

</html>